<?php

App::uses('AppController', 'Controller');

class SiteController extends AppController {

	public $uses = array('Setting', 'Contact');
	function beforeFilter(){
		$setting = $this->Setting->getAll();
		$lang = CakeSession::read('lang');
		$og_title = Message::label('mnu_home').'-'.site_name;
		$og_description = $setting['description_'.$lang];
		$og_url = $_SERVER['REQUEST_URI'];
		$og_image = $this->base.LOGO;
		$this->set_facebook($og_title, $og_description, $og_url, $og_image);

	}
	
	public function contact() {
		$setting = $this->Setting->getAll();
		$this->set('set', $setting);
		$this->set('title_layout', Message::label('title_contact'));
		$this->set('menu', 'contact');
		if($this->request->is('post')){

			$params = $this->data;
			$this->Contact->set($params);
			if(!$this->Contact->validates()){
				$this->set('params', $params);
			}
			else{
					$this->Contact->save();
					$this->Session->setFlash(Message::label('thank_contact'));
			}
		}
	}

	public function about() {
		$this->set('title_layout', Message::label('title_about'));
		$this->set('menu', 'about');
		$setting = $this->Setting->getAll();
		$this->set('item', $setting);
	}
}
