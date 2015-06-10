<?php

App::uses('Model', 'Model');

class Inquiry extends Model {
	public $name = 'Inquiry';
	public $useTable = 'inqueries';

	function getAll($limit = -1){
		$res = $this->find('all', array('fields' => array('id', 'name','email', 'content', 'tel', 'created'), 'conditions' => array('del_flg'=>0), 
			'order' => array('created' => 'desc'),
			'limit'=> $limit));
		return $res;
	}

	function getCount(){
		return $this->find('count', array('fields' => array('id'), 'conditions' => array('del_flg'=>0)));
	}
}