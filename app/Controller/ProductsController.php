<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {
	public $uses = array('Category', 'Product', 'SubCat', 'Comment');
	public $components = array('Paginator');

    // function beforeRender(){

    // }
	function beforeRender(){
        parent::beforeRender();
        $lang = CakeSession::read('lang');
        
		$subcats = $this->Category->getSubMenu($lang);

		$cats = $this->Category ->getForMenu();
		
        $lang = CakeSession::read('lang');

		$this->set('subcats', $subcats);
		$this->set('cats', $cats);
        $this->set('menu', 'product');
		$cat = false;
		if(isset($this->request->query['c'])){
			$cat =$this->request->query['c'];
			$cat =substr($cat,strrpos($cat, '-')+1);
			$this->set('cat', $cat);
			
			$cat_title = $this->SubCat->getById($cat, array('name_'.$lang));
            if($cat_title)
			     $this->set('cat_title', $cat_title['SubCat']['name_'.$lang]);
             else
                $this->set('cat_title','');
		}
        else if(isset($this->request->query['m'])){
            $cat =$this->request->query['m'];
            $cat =substr($cat,strrpos($cat, '-')+1);
            $this->set('mcat', $cat);

            $cat_title = $this->Category->getById($cat, array('name_'.$lang));
            if($cat_title)
                $this->set('cat_title', $cat_title['Category']['name_'.$lang]);
            else
                $this->set('cat_title','');
        }
		else
			$this->set('cat_title', Message::label('new_products'));
	}
	public function index($cat = false) {
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
			$cat =substr($cat,strrpos($cat, '-')+1);
            $conditions[] = array('Product.category' => $cat);
        }
        if(isset($this->request->query['m'])){
            $cat =$this->request->query['m'];
            $cat =substr($cat,strrpos($cat, '-')+1);
            $conditions[] = array('SubCat.category' => $cat);

            $joins[] = array(
                'table' => 'categories',
                'alias' => 'Category',
                'type' => 'INNER',
                'conditions' => array(
                    'Category.id = SubCat.category',
                    '`Category`.`deleted`' => 0,
                ));
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
        //echo '<pre>';print_r($order); exit;

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
        $count = $this->Product->find('count',array('joins' => $joins, 'conditions' => $conditions,));
        $data = $this->paginate('Product');

        $this->set('count', $count);
       	$this->set('items', $data);		
	}

	function detail(){
        if(isset($this->request->query['product']))
            $id = $this->request->query['product'];
        else{
            throw new BadRequestException('Could not find that post');
            exit;
        }
        $admin = false;
        if(CakeSession::check('User')){
            $admin = true;
        }
        $this->set('login', $admin);
		$this->set('title_layout', 'Products');
		$id =substr($id,strrpos($id, '-')+1);
        $this->set('id', $id);
        if(!is_numeric($id)){
            throw new BadRequestException('Could not find that post');
            exit;
        }
        $res = $this->Product->getBy('first', $id);

        //get comments
        $comments = $this->Comment->getAll($id);
        $this->set('comments', $comments);
        if($res){
            $this->set('item', $res);
            $this->set('cat', $res['SubCat']['id']);
        }
        else{
            throw new BadRequestException('Could not find that post');
            exit;
        }
	}

    function getajax($id = '')
    {
        if($this->request->is('ajax')){
            $this->set('title_layout', 'Products');
            $this->set('id', $id);

            $res = $this->Product->getBy('first', $id);
            $this->set('item', $res);

            $this->layout = false;   
        }
    }
    function rateajax(){
        if($this->request->is('ajax')){
            $data = $this->data;
            $res = $this->Product->getBy('first', $data['id']);

            $res['Product']['rate_count'] = $res['Product']['rate_count'] + 1;
            $div = 1;
            if($res['Product']['rate']!=0) $div = 2;
            $res['Product']['rate'] = ($res['Product']['rate'] + $data['rate']) / $div;
            $this->Product->save($res);
            CakeSession::write('rate_'.$data['id'], true);
            echo round($res['Product']['rate'], 2).'/'.$res['Product']['rate_count'] ;
            exit;
        }
    }
   
}
