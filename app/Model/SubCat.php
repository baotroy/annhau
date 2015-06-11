<?php

App::uses('AppModel', 'Model');

class SubCat extends AppModel {
	public $name = 'SubCat';
    public $useTable ='subcategories';

     public $validate = array(
        'name_vi' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
            ),
        'name_en' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
            ),
    );
    function getById($id = '', $fields = array()){
    	return $this->find('first', array('fields'=> $fields, 'conditions' => array('id'=>$id,'deleted'=>0)));
    }

    function getByCat($cat = '', $fields = array()){
    	return $this->find('all', array('fields'=> $fields, 'conditions' => array('category'=>$cat,'deleted'=>0)));
    }

}
