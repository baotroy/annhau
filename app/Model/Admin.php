<?php

App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');
class Admin extends Model {
	public $name = 'Admin';
	public $useTable= 'admin';

	public $validate = array(
		'username' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
                'alphanumber' => array(
                    'rule'=> 'alphanumeric',
                    'message' =>'not empty'
                    ),
                'maxlength' => array(
                    'rule'=> array('maxLength', 20),
                    'message' =>'not empty'
                    ),
                 'unique' => array(
                    'rule'=> 'uniqueUser',
                    'message' =>'not empty'
                    ),
            ),
        'firstname' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
                'maxlength' => array(
                    'rule'=> array('maxLength', 50),
                    'message' =>'not empty'
                    ),
            ),
        'lastname' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
                'maxlength' => array(
                    'rule'=> array('maxLength', 50),
                    'message' =>'not empty'
                    ),
            ),
        'email' => array(
                'format' => array(
                    'rule'=> 'email',
                    'message' =>'format',
                    'allowEmpty' => true
                    ),
                'maxlength' => array(
                    'rule'=> array('maxLength', 50),
                    'message' =>'not empty'
                    ),
            ),
        'password' => array(
                'format' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'format',
                    ),
                'maxlength' => array(
                    'rule'=> array('maxLength', 20),
                    'message' =>'messs'
                    ),
            ),
        
    );

	function getById($id){
		$res = $this->find('first', array('fields' => array('*'), 'conditions' => array('deleted'=>0, 'id'=> $id)));
		return $res;
	}

    function  uniqueUser($user){
        $res = $this->find('count', array('fields' => array('*'), 'conditions' => array('deleted'=>0, 'username'=> $user['username'])));
        if($res) return false;
        return true;
    }
	public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		// if we get a new password, hash it
		if (isset($this->data[$this->alias]['password_update'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
		}
	
		// fallback to our parent
		return parent::beforeSave($options);
	}
    function login($data){
        $username = $data['username'];
        $password = $data['password'];
        $password = AuthComponent::password($password);
        $res = $this->find('first', array('fields' => '*','conditions' => array('username' => $username, 'password'=> $password, 'active' => 1, 'deleted'=> 0)));
        if($res) return $res['Admin'];
        return false;
    }
}
