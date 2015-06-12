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
	function isNew($text){
		if(!$text) return false;
		$text= date_create($text);
		$datetime1 = date_format($text, 'Y-m-d H:i:s');
		$datetime1 = new DateTime($datetime1);
		$datetime2 = new DateTime(date('Y-m-d H:i:s'));
		$interval = $datetime1->diff($datetime2);

		if($interval->y == 0 && $interval->m ==0) return true;
		return false;
	}
	function date_diff($text){
		if(!$text) return '';
		$text= date_create($text);
		$datetime1 = date_format($text, 'Y-m-d H:i:s');
		$datetime1 = new DateTime($datetime1);
		$datetime2 = new DateTime(date('Y-m-d H:i:s'));
		$interval = $datetime1->diff($datetime2);
		//echo '<pre>';print_r($interval); exit;
		if($interval->y == 0 && $interval->m > 0){
			return $interval->m.' tháng trước';
		}
		else if($interval->y == 0 && $interval->m ==0 && $interval->d > 0){
			if($interval->d ==1) return 'Hôm qua';
			else return $interval->d .' ngày trước';
		}
		else if($interval->y == 0 && $interval->m ==0 && $interval->d == 0){
			if($interval->h > 0) return $interval->h .' giờ trước';
			else if($interval->h == 0 && $interval->i > 0) return $interval->i .' phút trước';
			else if($interval->h == 0 && $interval->i == 0 && $interval->s > 0)  return ' mới đây';
		}
		else if($interval->y > 0){
			return $interval->y .' năm trước';
		}
		//return $diff;
	}
	function clean($url) {
	   	$url = strtolower($url);
	    $url = strip_tags($url);
	    $url = stripslashes($url);
	    $url = html_entity_decode($url);

	    # Remove quotes (can't, etc.)
	    $url = str_replace('\'', '', $url);

	    # Replace non-alpha numeric with hyphens
	    
	    $url = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $url);
		$url = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $url);
		$url = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $url);
		$url = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $url);
		$url = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $url);
		$url = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $url);
		$url = preg_replace("/(đ)/", 'd', $url);
		$url = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $url);
		$url = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $url);
		$url = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $url);
		$url = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $url);
		$url = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $url);
		$url = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $url);
		$url = preg_replace("/(Đ)/", 'D', $url);
	    $url = trim($url, '-');

	    $match = '/[^a-z0-9]+/';
	    $replace = '-';
	    $url = preg_replace($match, $replace, $url);
	    
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
		if(CakeSession::check('lang')){
			$type = CakeSession::read('lang');
		}
		if($type == 'vi') $format = 'd/m/Y';
		if(!$text) return '';
		$date = new DateTime($text);
		return $date->format($format);
	}

	function image($file = '', $dir =''){
		if($file == '') return $this->base.FS.DIR_IMAGE.NO_IMAGE;
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
					return 'src="'.$this->base.FS.DIR_IMAGE.$dir.$file.'" ref="'.$this->base.FS.DIR_IMAGE.DIR_PRODUCT.$file.'"';
				}
			}
		}			
		return 'src="'.$this->base.FS.DIR_IMAGE.NO_IMAGE.'"';
	}

	function image_exist($file='', $dir = ''){
		if($file == '') return false;
		$file_path = WWW_ROOT.DIR_IMAGE.$dir.$file;

		if(file_exists($file_path)){
			return true;
		}
		return false;
	}

	function rating($rate=0){
		$ret = '<span class="star-rating rated">';
		for($i = 1; $i<=5; $i++){
			$ret .= '<i ';
			if($i<=$rate)
				$ret .= 'class="active"';
			$ret .= '></i>';
		}
		$ret .= '</span>';
		echo $ret;
	}

	
}
