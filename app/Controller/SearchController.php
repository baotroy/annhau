<?php

App::uses('AppController', 'Controller');

class SearchController extends AppController {
	public $uses = array('Category', 'Product', 'SubCat', 'Setting');
	public $components = array('Paginator');

	function beforeFilter(){
        parent::beforeFilter();
		$subcats = $this->Category->getSubMenu();
		$cats = $this->Category ->getForMenu();
		

		$this->set('subcats', $subcats);
		$this->set('cats', $cats);

		$cat = false;
		if(!isset($this->request->query['q']))
			$this->redirect(array('controller' => 'products'));

		if(isset($this->request->query['m'])){
			$cat = explode(',', $this->request->query['m']);
			$this->set('cat', $cat);
		}
		else{
			$this->set('cat', array());
		}
	}
	public function index($cat = false) {
        $lang = CakeSession::read('lang');
		$this->set('title_layout', 'Products');
        $joins = array();
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

        $conditions = array('Product.deleted' => 0, 'Product.available' => 1);

        if(isset($this->request->query['m'])){
        	$cat =$this->request->query['m'];
        	$cat = explode(',', $cat);
            $conditions[] = array('Product.category' => $cat);
        }
        $lang = CakeSession::read('lang');
        if(isset($this->request->query['q'])){
        	$q =$this->request->query['q'];
			
            $conditions[] = 'Product.name_'.$lang.' LIKE "%'. $q . '%"';
        }
        
        $order = array('Product.created desc');

        //get order
        if(isset($this->request->query['sort'])){
        	$by = 'asc';
        	$sort = $this->request->query['sort'];
            if($sort == 'name'){
                $sort = 'name_'.$lang;
            }
        	if(isset($this->request->query['by'])){
        		if(in_array($this->request->query['by'], array('asc','desc'))){
        			$by = $this->request->query['by'];
        		}
        	}
        	$order = array($sort => $by, 'Product.created' => 'desc');
        }
        //print_r($order);
        //end order

        $page = 1;
        if (isset($this->params['named']['page'])) {
            $page = $this->params['named']['page'];
        }
        
        $this->paginate = array(
            'Product' => array(
                'limit' => LIMIT,
                'page' => $page,
                'joins' => $joins,
                'fields' => array('*'),
                'conditions' => $conditions,
                'order' => $order,
            ),
        );
        $data = $this->paginate('Product');

        $count = $this->Product->find('count',array('joins' => $joins,'conditions' => $conditions,));
		$this->set('cat_title',$q);
        $this->set('search_page', true);
        $this->set('title_layout', Message::label('result_for').' "'.$q.'"');
        $this->set('count', $count);
       	$this->set('items', $data);		
		
        $setting = $this->Setting->getAll();
        $lang = CakeSession::read('lang');
        $og_title = Message::label('result_for', $lang).'"'.$q.'"-'.site_name;
        $og_description = $setting['description_'.$lang];
        $og_url = $_SERVER['REQUEST_URI'];
        $og_image = $this->base.FS.LOGO;
        $this->set_facebook($og_title, $og_description, $og_url, $og_image);
	}


}
