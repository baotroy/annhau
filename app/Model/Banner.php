<?php

App::uses('Model', 'Model');

class Banner extends Model {
	public $name = 'Banner';
	public $useTable = 'banners';

	function getAll(){
		$res = $this->find('all', array('fields' => array('id', 'image'), 'conditions' => array('del_flg'=>0)));
		$ret= array();
		foreach ($res as $key => $value) {
			$ret[$value['Banner']['id']] = $value['Banner']['image'];
		}
		return $ret;
	}
}
