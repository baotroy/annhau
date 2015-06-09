<?php

App::uses('AppModel', 'Model');

class Setting extends AppModel {
	public $name = 'Setting';
    public $useTable ='settings';
    
   function getAll($lang = 'vi'){
        $res = $this->find('first');
        $ret = array();
        foreach ($res['Setting'] as $key => $value) {
            $ret[$key] = $value;
        }
        return $ret;
   }
}
