<?php

App::uses('Model', 'Model');

class Contact extends Model {
	public $name = 'Contact';
	public $useTable = 'inqueries';

	
	public $validate = array(
        'name' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
            ),
        'email' => array(
        		'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
                'format' => array(
                    'rule'=> 'email',
                    'message' =>'not empty'
                    ),
            ),
        'tel' => array(
                'number' => array(
                    'rule'=> 'numeric',
                    'message' =>'not empty'
                    ),
            ),
		'content' => array(
                'number' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
            ),
    );
}
