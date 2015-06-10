<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {
	public $uses = array('Category', 'Product', 'Banner', 'Admin', 'Setting', 'Inquiry');

	public $components = array(
		'Session',
        'Auth' => array(
        	'loginAction' => array(
	            'controller' => 'admin',
	            'action' => 'login',
	        ),
            'loginRedirect' => array('controller' => 'admin', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'admin', 'action' => 'login'),
            'authenticate' => array(
	            'Form' => array(
	                'fields' => array(
	                  'username' => 'email', //Default is 'username' in the userModel
	                  'password' => 'password'  //Default is 'password' in the userModel
	                )
	            )
	        ),
			'authError' => 'You must be logged in to view this page.',
			'loginError' => 'Invalid Username or Password entered, please try again.'
 
        ), 'Common');
	
	// only allow the login controllers only
	public function beforeFilter() {
		$user = $this->Auth->user();
		$this->set('admin', $user);
		$this->set('title_layout', 'Admin');
        $this->Auth->allow('login');

        //get number of inquery
        $countInq= $this->Inquiry->getCount();
        $latestInq = $this->Inquiry->getAll(3);
        
        $this->set('num_inq', $countInq);
        $this->set('latestInq', $latestInq);
    }

	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}
	public function index() {
		$this->set('tab', 'index');
		$this->set('pt', 'Danh sách sản phẩm');
	}

	function category(){
		$this->set('tab', 'category');
	}

	function setting(){
		$this->set('tab', 'setting');
		$this->set('pt', 'Thiết lập');
		
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

	}

	function users(){

	}
	function banner(){
		$this->set('tab', 'banner');
		$this->set('pt', 'Thiết lập banner');
		$ban = $this->Banner->getAll();
		$this->set('items', $ban);
		if(isset($this->request->query['action'])){
			if($this->request->query['action'] == 'add'){
				if($this->request->is('post')){
					$file = $_FILES['image'];
					$new_name = 'banner'.date('yymmddHis');

					$file['new_name'] = 'banner'.date('ymdHis');
					if(!CakeSession::check('banner')){
						if($fn = $this->__saveImage($file, DIR_BANNER)){
							$this->Session->setFlash('Đã thêm.', 'default', array('class' =>'alert alert-success'));
							$this->Banner->save(array('image' => $fn));
							CakeSession::write('banner', true);
						}
					}
					else{
						CakeSession::delete('banner', true);
						$this->redirect($this->base.'/admin/banner?action=add');
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
					if($this->Banner->save(array('id'=>$this->request->query['id'], 'del_flg' => 1))){
						$this->Session->setFlash('Đã xóa.', 'default', array('class' =>'alert alert-success'));
						$this->redirect(array('action' => 'banner'));
					}
				}
			}
		}
		else{
			
			$this->set('items', $ban);
		}
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
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));		
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login($this->request->data)) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('Invalid username or password', 'default', array('class' => 'alert alert-danger'));
			}
		} 
	}

	function logout(){
		$this->redirect($this->Auth->logout());
	}

}
