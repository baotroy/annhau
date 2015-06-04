<?php

App::uses('AppModel', 'Model');

class Product extends AppModel {
	public $name = 'Product';
    public $useTable ='products';
    
    function getBy($id = false, $cat = false, $options = array('order' => 'Product.created', 'by' => 'desc', 'limit' =-1)){
    	$joins = array(
    		array(
                'table' => 'subcategories',
                'alias' => 'SubCat',
                'type' => 'INNER',
                'conditions' => array(
                    'Product.category = SubCat.id',
                    '`SubCat`.`deleted`' => 0,
                )
            ),);
        $conditions = array('Product.deleted' => 0, 'Product.available' => 1);
        if($id){
            $conditions[] = 'Product.id = '. $id;
        }
        if($cat && !$id){
            $conditions[] = 'Product.category = '. $cat;
        }
    	$res = $this->find('all', array('fields' => '*', 'conditions' => $conditions, 'joins' => $joins, 'order'=> array($order => $by), 'limit' => $options));
	    return $res;
    }
}
