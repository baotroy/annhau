<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {
	public $uses = array('Category', 'Product', 'SubCat', 'Comment');
	public $components = array('Paginator', 'Common');

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
        $og_title = site_name;
        $og_description = site_name;
        $og_image = $this->base.FS.LOGO;

		if(isset($this->request->query['c'])){
			$cat =$this->request->query['c'];
			$cat =substr($cat,strrpos($cat, '-')+1);
			$this->set('cat', $cat);
			
			$cat_title = $this->SubCat->getById($cat, array('name_'.$lang));
            if($cat_title){
			     $this->set('cat_title', $cat_title['SubCat']['name_'.$lang]);
                 $this->set('title_layout', $cat_title['SubCat']['name_'.$lang]);
                 $og_title = $cat_title['SubCat']['name_'.$lang];
                 $og_description = $og_title;
             }
             else
                $this->set('cat_title','');
		}
        else if(isset($this->request->query['m'])){
            $cat =$this->request->query['m'];
            $cat =substr($cat,strrpos($cat, '-')+1);
            $this->set('mcat', $cat);

            $cat_title = $this->Category->getById($cat, array('name_'.$lang, 'description_'.$lang));
            if($cat_title){
                $this->set('cat_title', $cat_title['Category']['name_'.$lang]);
                $this->set('title_layout',$cat_title['Category']['name_'.$lang]);
                $og_title = $cat_title['Category']['name_'.$lang];
                $og_description = $cat_title['Category']['description_'.$lang];
                $og_image = $this->base.FS.DIR_IMAGE.LOGO;
            }
            else
                $this->set('cat_title','');
        }
		else{
			$this->set('cat_title', Message::label('title_new_products'));
         //   $this->set('title_layout', Message::label('new_products'));
        }

        
        $og_url = $_SERVER['REQUEST_URI'];
        if($this->action!='detail')
            $this->set_facebook($og_title, $og_description, $og_url, $og_image);    
	}
	public function index($cat = false) {
		
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
        $joins = array();
   //      if(isset($this->request->query['c'])){
   //      	$cat =$this->request->query['c'];
			// $cat =substr($cat,strrpos($cat, '-')+1);
   //          $conditions[] = array('Product.category' => $cat);
   //      }
        if(isset($this->request->query['m'])){
            $cat =$this->request->query['m'];
            $cat =substr($cat,strrpos($cat, '-')+1);
    //        $conditions[] = array('SubCat.category' => $cat);

            $joins[] = array(
                'table' => 'categories',
                'alias' => 'Category',
                'type' => 'INNER',
                'conditions' => array(
                    'Category.id = Product.category',
                    '`Category`.`deleted`' => 0,
                    'Product.category' => $cat
                ));
        }
        else{
            $this->set('title_layout', Message::label('title_new_products'));
        }
        $order = array('Product.created' => 'desc');
        $lang = CakeSession::read('lang');
        //get order
        if(isset($this->request->query['sort'])){
        	$by = 'asc';
        	$sort = $this->request->query['sort'];
             if($sort == 'name'){
                $sort = 'name_'.$lang;
            }
            else{
                $sort = 'created';
            }
        	if(isset($this->request->query['by'])){
        		if(in_array($this->request->query['by'], array('asc','desc'))){
        			$by = $this->request->query['by'];
        		}
        	}
        	$order = array($sort => $by, 'Product.created' => 'desc');
        }
       
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

	function detail($product= ''){
        if($product)
            $id = $product;
        else{
            throw new BadRequestException('Could not find that post');
            exit;
        }
        $admin = false;
        if(CakeSession::check('User')){
            $admin = true;
        }
        $this->set('login', $admin);
		$id =substr($id,strrpos($id, '-')+1);
        $this->set('id', $id);
        if(!is_numeric($id)){
            throw new BadRequestException('Could not find that post');
            exit;
        }
        $res = $this->Product->getBy('first', $id);
        $lang = CakeSession::read('lang');
        //get comments
        $comments = $this->Comment->getAll($id);
        $this->set('comments', $comments);
        if($res){
            $this->set('item', $res);
            $this->set('cat', $res['Cat']['id']);
            $this->set('title_layout', $res['Product']['name_'.$lang]);

            $og_title = $res['Product']['name_'.$lang];
            $og_description = $res['Product']['long_description_'.$lang];
            $imgs = array($res['Product']['image_1'],$res['Product']['image_2'],$res['Product']['image_3'],$res['Product']['image_4'],$res['Product']['image_5']);
            $og_image = $this->Common->images($imgs, DIR_PRODUCT);
           
            $og_url = $_SERVER['REQUEST_URI'];
            $this->set_facebook($og_title, $og_description, $og_url, $og_image);    

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
