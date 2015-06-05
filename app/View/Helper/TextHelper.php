<?php

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class TextHelper extends Helper {
	function clean($url) {
	   	$url = strtolower($url);
	    $url = strip_tags($url);
	    $url = stripslashes($url);
	    $url = html_entity_decode($url);

	    # Remove quotes (can't, etc.)
	    $url = str_replace('\'', '', $url);

	    # Replace non-alpha numeric with hyphens
	    $match = '/[^a-z0-9]+/';
	    $replace = '-';
	    $url = preg_replace($match, $replace, $url);

	    $url = trim($url, '-');

	    return $url;
	}

	function time($text = ''){
		if(!$text) return '';
		$date = new DateTime($text);
		return $date->format('H:i');
	}

	function date($text = ''){
		$format = 'd/M/Y';
		$type = 'en';
		if(CakeSession::check('languague')){
			$type = CakeSession::read('language');
		}
		if(!$text) return '';
		$date = new DateTime($text);
		return $date->format($format);
	}

	function image($file = '', $dir =''){
		$file_path = WWW_ROOT.DIR_IMAGE.$dir.$file;

		if(file_exists($file_path)){
			return $this->base.FS.DIR_IMAGE.$dir.$file;
		}
		return $this->base.FS.DIR_IMAGE.NO_IMAGE;
	}

	function images($files = array(), $dir =''){
		$file = '';
		$file_path ='';
		foreach ($files as $key => $file) {
			if($file){
				$file_path = WWW_ROOT.DIR_IMAGE.$dir.$file;
				if(file_exists($file_path)){
					return $this->base.FS.DIR_IMAGE.$dir.$file;
				}
			}
		}			
		return $this->base.FS.DIR_IMAGE.NO_IMAGE;
	}

	function image_exist($file='', $dir = ''){
		if($file == '') return false;
		$file_path = WWW_ROOT.DIR_IMAGE.$dir.$file;

		if(file_exists($file_path)){
			return true;
		}
		return false;
	}
}
