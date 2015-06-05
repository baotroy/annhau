<?php

App::uses('AppController', 'Controller');

class CommentController extends AppController {
	public $uses = array('Comment');
	public $components = array('Enhance');
    function write(){
        if($this->request->is('ajax')){
            $data = $this->data;
            $this->Comment->set($data);
            $val = $this->Comment->validates();
            $res = array('code' => 0);
            $err =array();
            if($this->Comment->validationErrors){
                $res['code'] = 1;
                foreach ($this->Comment->validationErrors as $key => $value) {
                    $err[]=$key;
                }
                $res['error'] = $err;
            }
            else
            {
                $this->Comment->save();
                $res['rec']['created_date'] = $this->Enhance->date(date('Y-m-d H:i:s'));
                $res['rec']['created_time'] = date('H:i');
                $res['rec']['commentator'] = $data['commentator'];
                $res['rec']['content'] = $data['content'];
                CakeSession::write('commented', true);
            }
            echo json_encode($res);
        }
        exit;
    }
}
