<?php 
App::uses('Component', 'Controller');
class EnhanceComponent extends Component {
    function time($text = ''){
		if(!$text) return '';
		$date = new DateTime($text);
		return $date->format('H:i');
	}

	function date($text = ''){
		$type = 'en';
		if(CakeSession::check('languague')){
			$type = CakeSession::read('language');
		}
		$format = 'd/M/Y';
		if($type != 'en') $format = 'd/m/Y';
		if(!$text) return '';
		$date = new DateTime($text);
		return $date->format($format);
	}
}
 ?>