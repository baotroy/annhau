<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {

	public $uses = array();

	public function index() {
		
		$this->set('title_layout', 'Products');
	}

	
}
