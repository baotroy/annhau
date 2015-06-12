<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('Message', 'Lib');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	function beforeRender(){
		if(isset($this->request->query['lang'])){
			if($this->request->query['lang'] == 'en'){
				CakeSession::write('lang', 'en');
			}
			if($this->request->query['lang'] == 'vi'){
				CakeSession::write('lang', 'vi');
			}
		}

		if(!CakeSession::check('lang')){
			CakeSession::write('lang', DEFAULT_LANG);
		}

        if (isset($this->params['controller']) && $this->params['controller'] == 'admin') {
            $this->layout = 'admin';
        } 
	}
	function beforeFilter() {
		$this->beforeRender();
    }
    function set_facebook($title, $description, $url, $image){
    	$this->set('og_title', $title);
		$this->set('og_description', $description);
		$this->set('og_url', $url);
		$this->set('og_image', $image);
    }
}
