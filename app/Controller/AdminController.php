<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {
	public $uses = array('Category', 'Product', 'Banner', 'Admin', 'Setting', 'Inquiry', 'SubCat', 'Upload');
	private $breadcrumb;
	public $components = array('Session', 'Common', 'ResizeImage');
	
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
		$this->breadcrumb[] = array('TOP' => array('controller'=>'admin','action'=>'index'));
    }

	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}

	public function index() {
		$this->set('tab', 'index');
		$this->set('pt', 'Sản phẩm');
		$this->set('title_layout', 'Sản phẩm');

		$this->breadcrumb[] = array('Sản phẩm' => array('controller'=>'admin','action'=>'index'));
		if(isset($this->request->query['action'])){
			
			if($this->request->query['action'] == 'add'){
				$this->breadcrumb[] = array('Thêm' => array('controller'=>'admin','action'=>'index?action=add'));
				$this->set('breadcrumb', $this->breadcrumb);
				$this->set('pt', 'Thêm sản phẩm');
				$this->set('mode', 'add');
				if($this->request->is('post')){
				
					$data = $this->data;
					$data['available'] = 1;
					$data['created'] = date('Y-m-d H:i:s');
					$data['modified'] = date('Y-m-d H:i:s');
					$files = $_FILES;

					$this->__save_series_image($files, $data);
			
					$this->Product->set($data);
					if($this->Product->validates()){
						if($this->Product->save($data)){
							$this->Session->setFlash('Đã thêm.', 'default', array('class' =>'alert alert-success'));
						}
					}else{
						$this->set('item', array('Product'=>$data));
						$this->render('product-detail');
					}
				
				}
				$this->render('product-detail');
				return;
			}
			else if($this->request->query['action'] == 'edit'){
				$this->set('pt', 'Cập nhật sản phẩm');
				$this->set('mode', 'edit');
				$this->breadcrumb[] = array('Cập nhật' => array('controller'=>'admin','action'=>'index?action=edit'));
				$this->set('breadcrumb', $this->breadcrumb);
				if($this->request->is('post')){
					if(isset($this->request->query['id'])){
						$data = $this->data;
						$data['id'] = $this->request->query['id'];
						$files = $_FILES;
						$this->__save_series_image($files, $data);
						$this->Product->set($data);
						if($this->Product->validates()){
							if($this->Product->save($data)){
								$this->Session->setFlash('Đã cập nhật.', 'default', array('class' =>'alert alert-success'));
								return $this->redirect(array('action'=>'index'));

							}
						}else{
							$this->set('item', array('Product'=>$data));
							$this->render('product-detail');
						}
					}else{
						$this->redirect(array('action'=>'index'));
					}
				}else{
					if(isset($this->request->query['id'])){
						//load data len view
						$item =  $this->Product->getBy('first', $this->request->query['id'], false);

						$subcat = $this->SubCat->getById($item['Product']['category'], array('SubCat.category'));
						$this->set('current_cat', $subcat['SubCat']['category']);

						$subcat_list = $this->SubCat->getByCat($subcat['SubCat']['category']);
						$this->set('sub_cat_list', $subcat_list);

						if($item){
							$this->set('item', $item);
							$this->render('product-detail');
						}
						else{
							throw new BadRequestException('not found');
						}
					}
					else{
						$this->redirect(array('action'=>'index'));
					}
				}
				
			}
			else if($this->request->query['action'] == 'delete'){
				if(isset($this->request->query['id'])){
					if($this->Product->save(array('id'=>$this->request->query['id'], 'del_flg' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}
		}
		//SHOW LIST
		$joins = array(
    		array(
                'table' => 'subcategories',
                'alias' => 'SubCat',
                'type' => 'INNER',
                'conditions' => array(
                    'Product.category = SubCat.id',
                    '`SubCat`.`deleted`' => 0,)
                ),
    		array(
                'table' => 'categories',
                'alias' => 'Category',
                'type' => 'INNER',
                'conditions' => array(
                    'Category.id = SubCat.category',
                    '`Category`.`deleted`' => 0,)
                ),
        );

        $page = 1;
        if (isset($this->params['named']['page'])) {
            $page = $this->params['named']['page'];
        }
		$this->paginate = array(
            'Product' => array(
                'limit' => ADMIN_LIMIT,
                'page' => $page,
                'fields' => array('Product.id', 'Product.name_vi', 'Product.name_en', 'Product.available', 'Category.name_vi', 'SubCat.name_vi'),
                'joins' => $joins,
                'conditions' => array('Product.deleted'=>0),
                'order' => array('created' => 'desc'),
            ),
        );
        $all = $this->paginate('Product');
		$this->set('items', $all);

		$this->set('breadcrumb', $this->breadcrumb);
	}

	function category(){
		$this->set('tab', 'category');
		$this->set('pt', 'Danh mục');
		$this->set('title_layout', 'Danh mục');
		$this->breadcrumb[] = array('Danh mục' => array('controller'=>'admin','action'=>'category'));
		if(isset($this->request->query['action'])){
			$this->breadcrumb[] = array('Thêm' => array('controller'=>'admin','action'=>'category?action=add'));
			$this->set('breadcrumb', $this->breadcrumb);
			if($this->request->query['action'] == 'add'){
				$this->set('pt', 'Thêm danh mục');
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
				$this->breadcrumb[] = array('Cập nhật' => array('controller'=>'admin','action'=>'category?action=edit'));
				$this->set('breadcrumb', $this->breadcrumb);
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
						$this->redirect(array('action'=>'category'));
					}
				}
				
			}
			else if($this->request->query['action'] == 'delete'){
				if(isset($this->request->query['id'])){
					if($this->Category->save(array('id'=>$this->request->query['id'], 'deleted' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}
		}
		$this->set('breadcrumb', $this->breadcrumb);
	}

	function subcat(){
		$this->set('tab', 'category');
		if(!isset($this->request->query['c'])){
			$this->redirect(array('action' => 'category'));
		}

		$cat_id = $this->request->query['c'];
		$cat = $this->Category->getById($cat_id);
		if(!$cat){
			throw new  BadRequestException("Error Processing Request");
		}
		$SubCat = $this->SubCat->getByCat($cat_id, array('*'));
		$this->set('category', $cat_id);
		$this->set('items', $SubCat);
		$this->set('pt', $cat['Category']['name_vi'].' ('.$cat['Category']['name_en'].')');

		$this->breadcrumb[] = array('Danh mục' => array('controller'=>'admin','action'=>'category'));
		$this->breadcrumb[] = array($cat['Category']['name_vi'].' ('.$cat['Category']['name_en'].')' => array('controller'=>'admin','action'=>'subcat?c='.$cat_id));
		if(isset($this->request->query['action'])){
			if($this->request->query['action'] == 'add'){
				$this->breadcrumb[] = array('Thêm' => array('controller'=>'admin','action'=>'category?c='.$cat_id.'&action=add'));
				$this->set('breadcrumb', $this->breadcrumb);
				$this->set('pt', 'Thêm danh mục');
				$this->set('mode', 'add');
				if($this->request->is('post')){
				
					$data = $this->data;
					$data['created'] = date('Y-m-d H:i:s');
					$data['modified'] = date('Y-m-d H:i:s');

					$fn = false;
					$this->SubCat->set($data);
					if($this->SubCat->validates()){
						$data['category'] = $cat_id;
						if($this->SubCat->save($data)){
							$this->Session->setFlash('Đã thêm.', 'default', array('class' =>'alert alert-success'));
						}
					}else{
						$this->set('item', array('SubCat'=>$data));
						$this->render('subcat-detail');
					}
				
				}
				$this->render('subcat-detail');
				return;
			}
			else if($this->request->query['action'] == 'edit'){
				$this->set('pt', 'Cập nhật danh mục');
				$this->set('mode', 'edit');
				$this->breadcrumb[] = array('Cập nhật' => array('controller'=>'admin','action'=>'category?c='.$cat_id.'&action=edit'));
				$this->set('breadcrumb', $this->breadcrumb);
				if($this->request->is('post')){
					if(isset($this->request->query['id'])){
						$data = $this->data;

						$data['id'] = $this->request->query['id'];

						$this->SubCat->set($data);
						if($this->SubCat->validates()){
							if($this->SubCat->save($data)){
								$this->Session->setFlash('Đã cập nhật.', 'default', array('class' =>'alert alert-success'));
								$this->redirect(array('action'=>'subcat?c='.$cat_id));
							}
						}else{
							$this->set('item', array('SubCat'=>$data));
							$this->render('subcat-detail');
						}
					}else{
						$this->redirect(array('action'=>'subcat?c='.$cat_id));
					}
				}else{
					if(isset($this->request->query['id'])){
						//load data len view
						$item =  $this->SubCat->getById($this->request->query['id']);
						
						if($item){
							$this->set('item', $item);
							$this->render('subcat-detail');
						}
						else{
							throw new BadRequestException('not found');
						}
					}
					else{
						$this->redirect(array('action'=>'subcat?c='.$cat_id));
					}
				}
				
			}
			else if($this->request->query['action'] == 'delete'){
				if(isset($this->request->query['id'])){
					if($this->SubCat->save(array('id'=>$this->request->query['id'], 'deleted' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}
		}
		$this->set('breadcrumb', $this->breadcrumb);
	}
	function setting(){
		$this->set('tab', 'setting');
		$this->set('pt', 'Cài đặt');
		$this->set('title_layout', 'Cài đặt');
		$this->breadcrumb[] = array('Cài đặt' => array('controller'=>'admin','action'=>'setting'));
		$this->set('breadcrumb', $this->breadcrumb);
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
		$this->set('pt', 'Tin nhắn');
		$this->set('title_layout', 'Tin nhắn');
		$this->breadcrumb[] = array('Tin nhắn' => array('controller'=>'admin','action'=>'contact'));
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
					$this->breadcrumb[] = array($item['Inquiry']['name'] => array('controller'=>'admin','action'=>'contact?action=view'));
					$this->set('breadcrumb', $this->breadcrumb);
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
						$this->redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}
		}
		$this->set('breadcrumb', $this->breadcrumb);
	}

	function users(){
		$this->set('tab', 'user');
		$this->set('pt', 'Quản lý user');
		$this->set('title_layout', 'Quản lý user');
		$this->breadcrumb[] = array('Admin' => array('controller'=>'admin','action'=>'users'));
		$page = 1;
		$auth = CakeSession::read('User');
		$this->set('auth', $auth);
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
				$this->breadcrumb[] = array('Thêm' => array('controller'=>'admin','action'=>'users?action=add'));
				$this->set('breadcrumb', $this->breadcrumb);
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
				$this->breadcrumb[] = array('Cập nhật' => array('controller'=>'admin','action'=>'users?action=edit'));
				$this->set('breadcrumb', $this->breadcrumb);

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
					if($auth['id']==$this->request->query['id']){
						$this->Session->setFlash('Không thể xóa người dùng đang đăng nhập.', 'default', array('class' =>'alert alert-warning'));
						$this->redirect(array('action' => 'users'));
					}
					if($this->Admin->save(array('id'=>$this->request->query['id'], 'deleted' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}
		}
		$this->set('breadcrumb', $this->breadcrumb);
	}
	function banner(){
		$this->set('tab', 'banner');
		$this->set('pt', 'Thiết lập banner');
		$this->set('title_layout', 'Thiết lập banner');
		$this->breadcrumb[] = array('Banner' => array('controller'=>'admin','action'=>'banner'));
		$ban = $this->Banner->getAll();
		$this->set('items', $ban);
		if(isset($this->request->query['action'])){
			if($this->request->query['action'] == 'add'){
				$this->breadcrumb[] = array('Thêm' => array('controller'=>'admin','action'=>'banner?action=add'));
				$this->set('breadcrumb', $this->breadcrumb);
				if($this->request->is('post')){
					$file = $_FILES['image'];
					
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
		$this->set('breadcrumb', $this->breadcrumb);
	}
	function about(){
		$this->set('tab', 'about');
		$this->set('pt', 'Thông tin');
		$this->set('title_layout', 'Thông tin');
		$this->breadcrumb[] = array('Thông tin' => array('controller'=>'admin','action'=>'about'));

		if($this->request->is('post')){
			$data = $this->data['form'];
			$data['id'] = 1;
			if($this->Setting->save($data)){
				$this->Session->setFlash('Đã cập nhật.', 'default', array('class' =>'alert alert-success'));
				$this->redirect(array('action' => 'about?tab=1'));
			}
		}
		if(isset($this->request->query['action']) && $this->request->query['action'] == 'delete'){
			if(isset($this->request->query['id'])){
				$id = $this->request->query['id'];
				$item = $this->Upload->getById($id);
				$img = WWW_ROOT.DIR_IMAGE.DIR_UPLOAD.$item['Upload']['image'];
				if(file_exists($img)){
					unlink($img);
				}
				$this->Upload->save(array('id'=>$id, 'deleted' => 1));
				$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
			}
			$this->redirect(array('action' => 'about?tab=3'));
		}
		$data = $this->Setting->getAll();
		$this->set('item', $data);

		$uploads = $this->Upload->getAll();
		$this->set('items', $uploads);
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

    private function __save_series_image($files, &$data){
    	$index =0;
    	foreach ($files as $key => $file) {
    		if($file['name']){
	    		$file_name = 'p'.$index.date('yymdhis');
	    		$file['new_name'] = $file_name;
	    		$fn = $this->__saveImage($file, DIR_PRODUCT);
	    		copy(WWW_ROOT.DIR_IMAGE.DIR_PRODUCT.$fn, WWW_ROOT.DIR_IMAGE.DIR_PRODUCT.DIR_SMALL.$fn);
	    		$data[$key] = $fn;
	    		$this->__resizeSmall($fn);
	    	}
    		$index++;
    	}
    	//return $images;
    }
    private function __resizeSmall($img){
    	$path = WWW_ROOT.DIR_IMAGE.DIR_PRODUCT.DIR_SMALL;
    	
    	$source = $path.$img;


    	$this->ResizeImage->load($source);
        $imageInfo = getimagesize($source);
        if($imageInfo[0] > 256){//0 -> width, 1 -> height
            $this->ResizeImage->resize(256, 256);
            $this->ResizeImage->save($source);
        }
        return true;
    }
    function axcat(){
    	if($this->request->is('ajax')){
    		$category = $this->data['category'];
    		$subcats = $this->SubCat->getByCat($category);
    		$ret['code'] = 0;
    		if(!$subcats) $ret['code'] = 1;
    		foreach ($subcats as $key => $value) {
    			$ret['result'][] = array('id' => $value['SubCat']['id'], 'name' => $value['SubCat']['name_vi']);
    		}
    		echo json_encode($ret);
    	}
    	exit;
    }
    function axupload(){
    	if($this->request->is('ajax')):
	    	$file = $_FILES['image'];		
	    	$data = $this->params;
			$file['new_name'] = 'upl'.date('ymdHis');
			
			$ret['code'] = 0;
			if($fn = $this->__saveImage($file, DIR_UPLOAD)){
				$param['image'] = $fn;
				$this->Upload->save($param);
				$ret['val'] = $this->base.FS.DIR_IMAGE.DIR_UPLOAD.$fn;
			}
			else{
				$ret['code'] =1;
			}
    		echo json_encode($ret);
    	endif;
    	exit;
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
