<?php

App::uses('AppModel', 'Model');

class Product extends AppModel {
	public $name = 'Product';
    public $useTable ='products';

    function getBy($id = false, $cat = false, $order = 'Product.created', $by = 'desc', $limit =-1){
    	$joins = array(
    		array(
                'table' => 'categories',
                'alias' => 'Category',
                'type' => 'INNER',
                'conditions' => array(
                    'Product.category = Category.id',
                    '`Category`.`deleted`' => 0,
                )
            ),);
        $conditions = array('Product.deleted' => 0, 'Product.available' => 1);
        if($id){
            $conditions[] = 'Product.id = '. $id;
        }
        if($cat && !$id){
            $conditions[] = 'Product.category = '. $cat;
        }
    	$res = $this->find('all', array('fields' => '*', 'conditions' => $conditions, 'joins' => $joins, 'order'=> array($order => $by), 'limit' => $limit));
	    return $res;
    }
}
