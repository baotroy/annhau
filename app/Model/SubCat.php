<?php

App::uses('AppModel', 'Model');

class SubCat extends AppModel {
	public $name = 'SubCat';
    public $useTable ='subcategories';

    function getById($id = '', $fields = array()){
    	return $this->find('first', array('fields'=> $fields, 'conditions' => array('id'=>$id,'deleted'=>0)));
    }

}
