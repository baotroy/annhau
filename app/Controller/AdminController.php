<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {
	public $uses = array('Category', 'Product', 'Banner', 'Admin', 'Setting', 'Inquiry');

	public $components = array(
		'Session',
        'Common');
	
	// only allow the login controllers only
	public function beforeFilter() {
		if($this->action != 'login'){
			if(!CakeSession::check('User')) $this->redirect(array('action' => 'login'));
		}

		$user = CakeSession::read('User');
		$this->set('admin', $user);
		$this->set('title_layout', 'Admin');
        //get number of inquery
        $countInq= $this->Inquiry->getCount();
        $latestInq = $this->Inquiry->getUnread(3);
        
        $this->set('num_inq', $countInq);
        $this->set('latestInq', $latestInq);

		$cats = $this->Category ->manageAll();
		$this->set('cats', $cats);
    }

	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}
	public function index() {
		$this->set('tab', 'index');
		$this->set('pt', 'Sản phẩm');
		$this->set('title_layout', 'Sản phẩm');
	}

	function category(){
		$this->set('tab', 'category');
		$this->set('pt', 'Danh mục');
		$this->set('title_layout', 'Danh mục');

		if(isset($this->request->query['action'])){
			if($this->request->query['action'] == 'add'){
				$this->set('pt', 'Thêm anh mục');
				$this->set('mode', 'add');
				if($this->request->is('post')){
				
					$data = $this->data;
					$data['created'] = date('Y-m-d H:i:s');
					$data['modified'] = date('Y-m-d H:i:s');

					$fn = false;
					$this->Category->set($data);
					if($this->Category->validates()){
						if($_FILES['image']){
							$file = $_FILES['image'];
							$file['new_name'] = 'c'.date('ymdHis');
							$fn = $this->__saveImage($file, DIR_PRODUCT);
							if($fn){
								$data['image'] = $fn;
							}
						}
						if($this->Category->save($data)){
							$this->Session->setFlash('Đã thêm.', 'default', array('class' =>'alert alert-success'));
						}
					}else{
						$this->set('item', array('Category'=>$data));
						$this->render('cat-detail');
					}
				
				}
				$this->render('cat-detail');
				return;
			}
			else if($this->request->query['action'] == 'edit'){
				$this->set('pt', 'Cập nhật danh mục');
				$this->set('mode', 'edit');
				if($this->request->is('post')){
					if(isset($this->request->query['id'])){
						$data = $this->data;

						$data['id'] = $this->request->query['id'];

						$this->Category->set($data);
						if($this->Category->validates()){
							if($_FILES['image']){
								$file = $_FILES['image'];
								$file['new_name'] = 'c'.date('ymdHis');
								$fn = $this->__saveImage($file, DIR_PRODUCT);
								if($fn){
									$data['image'] = $fn;
								}
							}
							if($this->Category->save($data)){
								$this->Session->setFlash('Đã cập nhật.', 'default', array('class' =>'alert alert-success'));
								$this->redirect(array('action'=>'category'));
							}
						}else{
							$this->set('item', array('Category'=>$data));
							$this->render('cat-detail');
						}
					}else{
						$this->redirect(array('action'=>'category'));
					}
				}else{
					if(isset($this->request->query['id'])){
						//load data len view
						$item =  $this->Category->getById($this->request->query['id']);
						
						if($item){
							$this->set('item', $item);
							$this->render('cat-detail');
						}
						else{
							throw new BadRequestException('not found');
						}
					}
					else{
						$this->redirect(array('action'=>'users'));
					}
				}
				
			}
			else if($this->request->query['action'] == 'delete'){
				if(isset($this->request->query['id'])){
					if($this->Category->save(array('id'=>$this->request->query['id'], 'del_flg' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect($_SERVER['REQUEST_URI']);
					}
				}
			}
		}
	}

	function subcat(){

	}
	function setting(){
		$this->set('tab', 'setting');
		$this->set('pt', 'Cài đặt');
		$this->set('title_layout', 'Cài đặt');
		if($this->request->is('post')){
			$data = $this->data;
			if(@$data['map']){
				$map = explode(',', $data['map']);
				if(count($map) == 2){
					$data['map_lat'] = trim($map[0]);
					$data['map_long'] = trim($map[1]);
				}
			}
			foreach ($data as $key => $value) {
				$data[$key] = h($value);
			}
			$data['id'] = 1;
			
			if($this->Setting->save($data)){
				$this->Session->setFlash('Cập nhật thành công.', 'default', array('class' =>'alert alert-success'));
			}
		}
		$set = $this->Setting->getAll();
		$this->set('params', $set);
	}

	function contact(){
		$this->set('tab', 'contact');
		$this->set('pt', 'Liên hệ');
		$this->set('title_layout', 'Liên hệ');

		$page = 1;
        if (isset($this->params['named']['page'])) {
            $page = $this->params['named']['page'];
        }
		$this->paginate = array(
            'Inquiry' => array(
                'limit' => ADMIN_LIMIT,
                'page' => $page,
                'fields' => array('*'),
                'conditions' => array('del_flg'=>0),
                'order' => array('read' => 'asc','created' => 'desc'),
            ),
        );
        $all = $this->paginate('Inquiry');
		$this->set('items', $all);

		if(isset($this->request->query['action'])){
			if($this->request->query['action'] == 'view'){
				if(isset($this->request->query['id'])){
					$item = $this->Inquiry->getById($this->request->query['id']);
					if(!$item){
						throw new BadRequestException('not found');
						
					}
					$this->set('item', $item);
					if(!$item['Inquiry']['read'])
						$this->Inquiry->save(array('id'=>$this->request->query['id'], 'read' => date('Y-m-d H:i:s')));
					$countInq= $this->Inquiry->getCount();
					$this->set('num_inq', $countInq);
					$this->render('contact-detail');
				}
			}
			else if($this->request->query['action'] == 'delete'){
				if(isset($this->request->query['id'])){
					if($this->Inquiry->save(array('id'=>$this->request->query['id'], 'del_flg' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect($_SERVER['REQUEST_URI']);
					}
				}
			}
		}
	}

	function users(){
		$this->set('tab', 'user');
		$this->set('pt', 'Quản lý user');
		$this->set('title_layout', 'Quản lý user');

		$page = 1;
        if (isset($this->params['named']['page'])) {
            $page = $this->params['named']['page'];
        }
		$this->paginate = array(
            'Admin' => array(
                'limit' => ADMIN_LIMIT,
                'page' => $page,
                'fields' => array('*'),
                'conditions' => array('deleted'=> 0),
                'order' => array('active' => 'desc','created' => 'desc'),
            ),
        );
        $all = $this->paginate('Admin');
		$this->set('items', $all);

		if(isset($this->request->query['action'])){
			if($this->request->query['action'] == 'add'){
				$this->set('pt', 'Thêm người quản lý');
				$this->set('mode', 'add');
				if($this->request->is('post')){
					if(!CakeSession::check('adduser')){
						$data = $this->data;
						$data['created'] = date('Y-m-d H:i:s');
						$data['modified'] = date('Y-m-d H:i:s');

						if(!isset($data['active'])) $data['active'] = 0;

						$this->Admin->set($data);
						if($this->Admin->validates()){
							if($this->Admin->save()){
								$this->Session->setFlash('Đã thêm.', 'default', array('class' =>'alert alert-success'));
							}
						}else{
							$this->set('item', array('Admin'=>$data));
							$this->render('user-detail');
						}
					}
					else{
						CakeSession::delete('adduser', true);
						$this->redirect($this->base.'/admin/users?action=add');
					}
				}
				$this->render('user-detail');
				return;
			}
			else if($this->request->query['action'] == 'edit'){
				$this->set('pt', 'Cập nhật người quản lý');
				$this->set('mode', 'edit');
				if($this->request->is('post')){
					if(isset($this->request->query['id'])){
						$data = $this->data;
						if($data['password']=='') unset($data['password']);

						if(!isset($data['active'])) $data['active'] = 0;
						$data['id'] = $this->request->query['id'];
						$this->Admin->set($data);
						if($this->Admin->validates()){
							if($this->Admin->save()){
								$this->Session->setFlash('Đã cập nhật.', 'default', array('class' =>'alert alert-success'));
								$this->redirect(array('action'=>'users'));
							}
						}else{
							$this->set('item', array('Admin'=>$data));
							$this->render('user-detail');
						}
					}else{
						$this->redirect(array('action'=>'users'));
					}
				}else{
					if(isset($this->request->query['id'])){
						//load data len view
						$item =  $this->Admin->getById($this->request->query['id']);
						
						if($item){
							$this->set('item', $item);
							$this->render('user-detail');
						}
						else{
							throw new BadRequestException('not found');
						}
					}
					else{
						$this->redirect(array('action'=>'users'));
					}
				}
				
			}
			else if($this->request->query['action'] == 'delete'){
				if(isset($this->request->query['id'])){
					if($this->Admin->save(array('id'=>$this->request->query['id'], 'del_flg' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect($_SERVER['REQUEST_URI']);
					}
				}
			}
		}
	}
	function banner(){
		$this->set('tab', 'banner');
		$this->set('pt', 'Thiết lập banner');
		$this->set('title_layout', 'Thiết lập banner');

		$ban = $this->Banner->getAll();
		$this->set('items', $ban);
		if(isset($this->request->query['action'])){
			if($this->request->query['action'] == 'add'){
				if($this->request->is('post')){
					$file = $_FILES['image'];
					$new_name = 'banner'.date('yymmddHis');

					$file['new_name'] = 'banner'.date('ymdHis');
					
					if($fn = $this->__saveImage($file, DIR_BANNER)){
						$this->Session->setFlash('Đã thêm.', 'default', array('class' =>'alert alert-success'));
						$this->Banner->save(array('image' => $fn));
						CakeSession::write('banner', true);
					}
					
				}
				$this->render('banner_edit');
				return;
			}
			// else if($this->request->query['action'] == 'edit'){
			// 	if(isset($this->request->query['id'])){
			// 		$this->render('banner_edit');
			// 		return;
			// 	}else{
			// 		$this->redirect(array('action'=>'banner'));
			// 	}
			// }
			else if($this->request->query['action'] == 'delete'){
				if(isset($this->request->query['id'])){
					$item = $this->Banner->getById($this->request->query['id']);
							
					if($this->Banner->save(array('id'=>$this->request->query['id'], 'del_flg' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$img = WWW_ROOT.DIR_IMAGE.DIR_BANNER.$item['Banner']['image'];
						if(file_exists($img)){
							unlink($img);
						}
						$this->redirect(array('action' => 'banner'));
					}
				}
			}
		}
		// else{
			
		// 	$this->set('items', $ban);
		// }
	}

	private function __saveImage($params, $directory) {
		$ext = pathinfo($params['name'], PATHINFO_EXTENSION);

        $dir =  WWW_ROOT;
        $this->Common->createDir($dir);
        $dir .= DIR_IMAGE;
        $this->Common->createDir($dir);
        $dir .= $directory;
        $destination = $dir . $params['new_name'].'.'.$ext;
        if (!file_exists($dir)) {
            $this->Common->createDir($dir);
        }
        if (move_uploaded_file($params['tmp_name'], $destination)) {
            return $params['new_name'].'.'.$ext;
        }return false;
    }
	function login(){
		//if already logged-in, redirect
		$this->set('pt', 'Đăng nhập');
		if($this->Session->check('User')){
			$this->redirect(array('action' => 'index'));		
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($user = $this->Admin->login($this->request->data)) {
				CakeSession::write('User', $user);
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Invalid username or password', 'default', array('class' => 'alert alert-danger'));
			}
		} 
	}

	function logout(){
		CakeSession::destroy();
		$this->redirect(array('action' =>'login'));
	}

}
