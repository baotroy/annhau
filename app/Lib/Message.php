<?php
class Message {
	
	// get message from message id
	// ex: echo Message::get('MSG_CM_01', 'Text');
	static public function get($id, $msg, $settings = array()){
		$message = false;		
		//$message = Constants::$message_jp;
		
		if (!isset($message[$id])) return '';		
		
		if(isset($settings[$id])) $str = $settings[$id];
		else if (isset($message[$id])) $str = $message[$id];
		else return '';
		
		$rep = array();
		
		if (is_string($msg)){
			$rep[] = $msg;
		}
		
		if (is_array($msg)){
			$rep = array_merge($msg);
		}
		
		foreach ($rep as $key => $val){
			$index = '{'.($key+1).'}';
			$str = str_replace("$index", $val, $str);
		}
		return $str;
	}
	
	static public function set($id, $msg, $settings = array()){
		$message = false;		
		$message = Constants::$message_jp;
		
		if(isset($settings[$id])) $str = $settings[$id];
		else if (isset($message[$id])) $str = $message[$id];
		else return '';
		
		$rep = array();
		
		if (is_string($msg)){
			$rep[] = $msg;
		}
		
		if (is_array($msg)){
			$rep = array_merge($msg);
		}
		
		foreach ($rep as $key => $val){
			$index = '{'.($key+1).'}';
			$str = str_replace("$index", $val, $str);
		}
		return $str;
	}

	static public function label($id, $settings = array()){
		$message = false;		
		$lang = CakeSession::read('lang');
		if($lang == 'vi')
			$message = Constants::$dic_vi;
		else 
			$message = Constants::$dic_en;
		
		if (isset($message[$id])) return $message[$id];
		else return '';
	}
}