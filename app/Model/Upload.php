<?php

App::uses('Model', 'Model');

class Upload extends Model {
	public $name = 'Upload';
	public $useTable = 'uploads';

	function getAll(){
		$res = $this->find('all', array('fields' => array('id', 'image'),'order' =>array('created'=>'desc') , 'conditions' => array('deleted'=>0)));
		$ret= array();
		foreach ($res as $key => $value) {
			$ret[$value['Upload']['id']] = $value['Upload']['image'];
		}
		return $ret;
	}
	function getById($id){
		return $this->find('first', array('fields' => array('image'),'conditions' => array('deleted'=>0, 'id' => $id)));
	}
}
