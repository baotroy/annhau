<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {
	public $uses = array('Category', 'Product', 'Banner', 'Admin');

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
 
        ));
	
	// only allow the login controllers only
	public function beforeFilter() {
		$user = $this->Auth->user();
		$this->set('admin', $user);
		$this->set('title_layout', 'Admin');
        $this->Auth->allow('login');
    }

    // function beforeRender(){
    // 	// $user = $this->Auth->user();
    // 	// $this->set('admin', $user);
    // }
	
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
	}

	function contact(){
		$this->set('tab', 'contact');
		$this->set('pt', 'Liên hệ');
	}

	function banner(){
		$this->set('tab', 'banner');
		$this->set('pt', 'Thiết lập banner');
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
