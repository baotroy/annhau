<?php

App::uses('AppModel', 'Model');

class Category extends AppModel {
	public $name = 'Category';
    public $useTable ='categories';

    function getById($id = '', $fields = array()){
        return $this->find('first', array('fields'=> $fields, 'conditions' => array('id'=>$id,'deleted'=>0)));
    }

    function getForMenu(){
    	$joins = array(
            array(
                'table' => 'subcategories',
                'alias' => 'SubCat',
                'type' => 'INNER',
                'conditions' => array(
                    'SubCat.category = Category.id',
                    'SubCat.deleted' => 0,
                )
            ),
    		array(
                'table' => 'products',
                'alias' => 'Product',
                'type' => 'INNER',
                'conditions' => array(
                    'Product.category = SubCat.id',
                    'Product.deleted' => 0,
                    'Product.available' => 1,
                )
            ),);
    	$res = $this->find('all', array('fields' => 'Category.*,  count(`Product`.`id`) as`product_count`', 'conditions' => array('`Category`.`deleted`' => 0), 'joins' => $joins, 'group' => 'Category.id'));
    	foreach ($res as $key => $value) {
    		$res[$key]['Category']['product_count'] = $value[0]['product_count'];
    	}
    	return $res;
    }

    function getSubMenu(){
        $joins = array(
            array(
                'table' => 'subcategories',
                'alias' => 'SubCat',
                'type' => 'INNER',
                'conditions' => array(
                    'SubCat.category = Category.id',
                    'SubCat.deleted' => 0,
                )
            ),);

        $res = $this->find('all', array('fields' => 'SubCat.*', 'conditions' => array('`Category`.`deleted`' => 0), 
            'joins' => $joins));
        $ret = array();
        foreach ($res as $key => $value) {
            $ret[$value['SubCat']['category']][$value['SubCat']['id']] = $value['SubCat']['name'];
        }
        return $ret;
    }

    function getAll($fields = array()){
        $joins = array(
            array(
                'table' => 'subcategories',
                'alias' => 'SubCat',
                'type' => 'LEFT',
                'conditions' => array(
                    'SubCat.category = Category.id',
                    'SubCat.deleted' => 0,
                )
            ),
            array(
                'table' => 'products',
                'alias' => 'Product',
                'type' => 'LEFT',
                'conditions' => array(
                    'Product.category = SubCat.id',
                    'Product.deleted' => 0,
                ),
            ),
        );

        $res = $this->find('all', array('fields' => 'Category.*, Product.*', 'conditions' => array('`Category`.`deleted`' => 0), 
            'joins' => $joins, 'group' => 'Category.id'));
        return $res; 

    }
}
