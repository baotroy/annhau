<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $uses = array('Category', 'Product', 'Banner');

	public function index() {
		$this->set('title_layout', Message::label('mnu_home'));
		
		//get new products

		$products = $this->Product->getBy('all', false, false, array('order' => 'Product.created', 'by' => 'desc', 'limit' => 12));
		
		$this->set('latest', $products);
		$best = $this->Product->getBy('all', false, false, array('order' => 'rate', 'by'=>'desc', 'limit' => LIMIT_BEST));

		$this->set('best', $best);
		$cats = $this->Category->getAll();
		$this->set('cats', $cats);
		
		$banners = $this->Banner->getAll();
		$this->set('banners', $banners);
		$this->set('menu', 'index');
	}
}
