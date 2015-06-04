<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {
	public $uses = array('Category', 'Product', 'SubCat');
	public $components = array('Paginator');

	function beforeFilter(){

		$subcats = $this->Category->getSubMenu();
		$cats = $this->Category ->getForMenu();
		

		$this->set('subcats', $subcats);
		$this->set('cats', $cats);

		$cat = false;
		if(isset($this->request->query['c'])){
			$cat =$this->request->query['c'];
			$cat =substr($cat,strrpos($cat, '-')+1);
			$this->set('cat', $cat);
			
			$cat_title = $this->SubCat->getById($cat, array('name'));
			$this->set('cat_title', $cat_title['SubCat']['name']);
		}
	}
	public function index($cat = false) {
		$this->set('title_layout', 'Products');

		
		// $joins = array(
  //   		array(
  //               'table' => 'subcategories',
  //               'alias' => 'SubCat',
  //               'type' => 'INNER',
  //               'conditions' => array(
  //                   'Product.category = SubCat.id',
  //                   '`SubCat`.`deleted`' => 0,
  //               )
  //           ),);
  //       $conditions = array('Product.deleted' => 0, 'Product.available' => 1);
  //       if($id){
  //           $conditions[] = 'Product.id = '. $id;
  //       }
  //       if($cat && !$id){
  //           $conditions[] = 'Product.category = '. $cat;
  //       }
  //   	$res = $this->find('all', array('fields' => '*', 'conditions' => $conditions, 'joins' => $joins, 'order'=> array($order => $by), 'limit' => $options));

		// $this->Paginator->settings = array(
		// 	'joins' => $joins,
	 //        'conditions' => $conditions,
	 //        'limit' => 10
	 //    );
		
	}

	function detail($id = ''){
		$this->set('title_layout', 'Products');
		$this->set('cat', 1);
	}
}
