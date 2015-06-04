<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $uses = array('Comment');

	public function index() {
		$this->set('title_layout', 'Home');
		
		$res = $this->Comment->getAll(1);
		
	}
}
