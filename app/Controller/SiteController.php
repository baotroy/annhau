<?php

App::uses('AppController', 'Controller');

class SiteController extends AppController {

	public $uses = array('Setting', 'Contact');
	function beforeFilter(){

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
				//	CakeSession::write('success', true);
				// }else{
				// 	CakeSession::delete('success');
				// 	$this->redirect(array('controller'=>'site', 'action'=> 'contact'));
				// }
			}

		}
	}

	public function about() {
		$this->set('title_layout', Message::label('title_about'));
		$this->set('menu', 'about');
	}
}
