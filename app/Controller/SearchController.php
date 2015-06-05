<?php

App::uses('AppController', 'Controller');

class SearchController extends AppController {
	public $uses = array('Category', 'Product', 'SubCat');
	public $components = array('Paginator');

	function beforeFilter(){

		$subcats = $this->Category->getSubMenu();
		$cats = $this->Category ->getForMenu();
		

		$this->set('subcats', $subcats);
		$this->set('cats', $cats);

		$cat = false;
		if(!isset($this->request->query['q']))
			$this->redirect(array('controller' => 'products'));

		if(isset($this->request->query['c'])){
			$cat = explode(',', $this->request->query['c']);
			$this->set('cat', $cat);
		}
		else{
			$this->set('cat', array());
		}
	}
	public function index($cat = false) {
		$this->set('title_layout', 'Products');

		$this->set('title_layout', 'Products');

		
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

        if(isset($this->request->query['c'])){
        	$cat =$this->request->query['c'];
        	$cat = explode(',', $cat);
            $conditions[] = array('Product.category' => $cat);
        }

        if(isset($this->request->query['q'])){
        	$q =$this->request->query['q'];
			
            $conditions[] = 'Product.name LIKE "%'. $q . '%"';
        }
        
        $order = array('Product.created' => 'desc');

        //get order
        if(isset($this->request->query['sort'])){
        	$by = 'asc';
        	$sort = $this->request->query['sort'];
        	if(isset($this->request->query['by'])){
        		if(in_array($this->request->query['by'], array('asc','desc'))){
        			$by = $this->request->query['by'];
        		}
        	}
        	$order = array($sort => $by);
        }
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

        $count = $this->Product->find('count',array('joins' => $joins,
'conditions' => $conditions,));
		$this->set('cat_title', 'Results for "'.$q.'" ('.$count.' '.ITEM.')');
       	$this->set('items', $data);		
		
	}


}
