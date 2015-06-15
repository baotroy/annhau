<?php

App::uses('Model', 'Model');

class Service extends Model {
	public $name = 'Service';
	public $useTable = 'services';
	public $validate = array(
        // 'name_vi' => array(
        //         'notEmpty' => array(
        //             'rule'=> 'notEmpty',
        //             'message' =>'not empty'
        //             ),
        //     ),
        // 'name_en' => array(
        //         'notEmpty' => array(
        //             'rule'=> 'notEmpty',
        //             'message' =>'not empty'
        //             ),
        //     ),
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
