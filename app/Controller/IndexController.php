<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $uses = array();

	public function index() {
		$this->set('title_layout', 'Home');
	}
}
