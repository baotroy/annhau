<?php

App::uses('AppModel', 'Model');

class Product extends AppModel {
	public $name = 'Product';
    public $useTable ='products';
    
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

    function getBy($get_type = 'all', $id = false, $cat = false, $options = array('order' => 'Product.created', 'by' => 'desc', 'limit' => -1))
    {
    	$joins = array(
    		array(
                'table' => 'categories',
                'alias' => 'Cat',
                'type' => 'INNER',
                'conditions' => array(
                    'Product.category = Cat.id',
                    '`Cat`.`deleted`' => 0,)
                )
        );
        $conditions = array('Product.deleted' => 0, 'Product.available' => 1);
        if($id){
            $conditions[] = array('Product.id' => $id);
        }
        if($cat && !$id){
            $conditions[] = 'Product.category = '. $cat;
        }
    	$res = $this->find($get_type, array('fields' => '*', 'conditions' => $conditions, 'joins' => $joins, 'order'=> array($options['order'] => $options['by']), 'limit' => $options['limit']));
	    return $res;
    }
}
