<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {
	public $name = 'Comment';
    public $useTable ='comments';

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
    	$res = $this->find('all', array('fields' => 'Comment.*', 'conditions' => array('Comment.deleted' => 0), 'joins' => $joins, 'order'=> array('Comment.created' => 'desc')));
	    return $res;
    }
}
