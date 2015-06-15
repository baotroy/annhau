<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {
	public $uses = array('Category', 'Product', 'Banner', 'Setting', 'Service', 'Testimonial');

	public function index() {
		
		
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
		
		$setting = $this->Setting->getAll();
		$lang = CakeSession::read('lang');
		$og_title = Message::label('mnu_home').'-'.site_name;
		$og_description = $setting['description_'.$lang];
		$og_url = $_SERVER['REQUEST_URI'];
		$og_image = $this->base.FS.LOGO;
		$this->set_facebook($og_title, $og_description, $og_url, $og_image);

		$this->set('title_layout', Message::label('title_home'));

		$data = $this->Service->getAll();
		$this->set('services', $data);

		$data = $this->Testimonial->getAll();
		$this->set('testimonial', $data);
	}
}
