<?php

App::uses('AppController', 'Controller');

class SiteController extends AppController {

	public $uses = array('Setting', 'Contact', 'Service', 'Testimonial');
	function beforeFilter(){
		parent::beforeFilter();
		$setting = $this->Setting->getAll();
		$lang = CakeSession::read('lang');
		$og_title = Message::label('mnu_home').'-'.site_name;
		$og_description = $setting['description_'.$lang];
		$og_url = $_SERVER['REQUEST_URI'];
		$og_image = $this->base.FS.LOGO;
		$this->set_facebook($og_title, $og_description, $og_url, $og_image);

	}
	
	public function contact() {
		$setting = $this->Setting->getAll();
		$this->set('set', $setting);
		$lang = CakeSession::read('lang');
		$this->set('title_layout', Message::label('title_contact', $lang));
		$this->set('menu', 'contact');
		if($this->request->is('post')){

			$params = $this->data;
			$this->Contact->set($params);
			if(!$this->Contact->validates()){
				$this->set('params', $params);
			}
			else{
					$this->Contact->save();
					$this->set('contact', true);
			}
		}
	}

	public function about() {
		$lang = CakeSession::read('lang');
		$this->set('title_layout', Message::label('title_about', $lang));
		$this->set('menu', 'about');
		$setting = $this->Setting->getAll();
		$this->set('item', $setting);
	}

	function services($id=''){
		$lang = CakeSession::read('lang');
		if(!$id){
            throw new BadRequestException('Could not find that post');
            exit;
        }
		$id =substr($id,strrpos($id, '-')+1);
		
		$item = $this->Service->getById($id);
		if(!$item){
            throw new BadRequestException('Could not find that post');
            exit;
        }
        $this->set('item', $item['Service']);
        $this->set('title_layout', $item['Service']['name_'.$lang]);
	}

	function testimonial($id=''){
		$lang = CakeSession::read('lang');
		if(!$id){
            throw new BadRequestException('Could not find that post');
            exit;
        }
				
		$item = $this->Testimonial->getById($id);
		if(!$item){
            throw new BadRequestException('Could not find that post');
            exit;
        }
        $this->set('item', $item['Testimonial']);
        $this->set('title_layout', $item['Testimonial']['name_'.$lang]);
	}
}
