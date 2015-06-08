<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $uses = array('Category', 'Product');

	public function index() {
		$this->set('title_layout', 'Home');
		
		//get new products

		$products = $this->Product->getBy('all', false, false, array('order' => 'Product.created', 'by' => 'desc', 'limit' => 12));
		
		$this->set('latest', $products);

		$cats = $this->Category->getAll();
		$this->set('cats', $cats);
		//echo '<pre>';print_r($cats); exit;
	}
}
