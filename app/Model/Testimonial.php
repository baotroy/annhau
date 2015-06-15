<?php

App::uses('Model', 'Model');

class Testimonial extends Model {
	public $name = 'Testimonial';
	public $useTable = 'testimonial';
	public $validate = array(
        // 'description_vi' => array(
        //         'notEmpty' => array(
        //             'rule'=> 'notEmpty',
        //             'message' =>'not empty'
        //             ),
        //     ),
        // 'description_en' => array(
        //         'notEmpty' => array(
        //             'rule'=> 'notEmpty',
        //             'message' =>'not empty'
        //             ),
        //     ),
    );
	function getAll(){
		$res = $this->find('all', array('fields' => array('*'),'order' =>array('created'=>'desc') , 'conditions' => array('deleted'=>0)));
		
		return $res;
	}
	function getById($id){
		return $this->find('first', array('fields' => array('*'),'conditions' => array('deleted'=>0, 'id' => $id)));
	}
}
