<?php

App::uses('AppModel', 'Model');

class Category extends AppModel {
	public $name = 'Category';
    public $useTable ='categories';

    function getAll(){
    	$joins = array(
    		array(
                'table' => 'products',
                'alias' => 'Product',
                'type' => 'LEFT',
                'conditions' => array(
                    'Product.category = Category.id',
                    'Product.deleted' => 0,
                    'Product.available' => 1,
                )
            ),);
    	$res = $this->find('all', array('fields' => 'Category.*, count(`Product`.`id`) as`product_count`', 'conditions' => array('`Category`.`deleted`' => 0), 'joins' => $joins, 'group' => 'Category.id'));
    	foreach ($res as $key => $value) {
    		$res[$key]['Category']['product_count'] = $value[0]['product_count'];
    	}
    	return $res;
    }
}
