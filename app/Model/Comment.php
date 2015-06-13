<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {
	public $name = 'Comment';
    public $useTable ='comments';


    public $validate = array(
        'commentator' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
                'max' => array(
                    'rule'=> array('maxLength', 10),
                    //'message' =>'not empty'
                    ),
            ),
        'email' => array(
                'format' => array(
                    'rule'=> 'email',
                    'message' =>'not empty'
                    ),
            ),
        'content' => array(
                'notEmpty' => array(
                    'rule'=> 'notEmpty',
                    'message' =>'not empty'
                    ),
            ),


    );
    function getAll($product){
    	$joins = array(
    		array(
                'table' => 'products',
                'alias' => 'Product',
                'type' => 'INNER',
                'conditions' => array(
                    'Product.id = Comment.product',
                    '`Product`.`deleted`' => 0,
                )
            ),);
    	$res = $this->find('all', array('fields' => 'Comment.*', 'conditions' => array('Comment.product' => $product, 'Comment.deleted' => 0), 'joins' => $joins, 'order'=> array('Comment.created' => 'desc')));
	    return $res;
    }
}
