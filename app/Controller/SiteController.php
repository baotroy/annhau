<?php

App::uses('AppController', 'Controller');

class SiteController extends AppController {

	public $uses = array();

	public function contact() {
		
		$this->set('title_layout', 'Contact');
	}

	public function about() {
		$this->set('title_layout', 'About');
	}
}
