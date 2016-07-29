<?php

class Res {
    public $msg; public $success; public $data;

    public function __construct(){
        $this->success = 'false';
        $this->data    = null;
        $this->msg   = '';
    }

    public function ok($data = null){
        $this->success = true;
        if(!is_null($data)){$this->data=$data;}
        return Response::json($this, 200);
    }

    public function ex($msg = 'An error occurred...', $statusCode = 200){
        $this->success=false;
        $this->msg=$msg;
        return Response::json( $this, $statusCode);
    }

    public function failex(Exception $e) {
        myLog::Error($e->getMessage());
        $msg='Failed Exception: An error occurred while performing the process... ';
        if(Config::get('app.debug')){$msg.=$e->getMessage();}

        $this->success=false;
        $this->msg=$msg;
        return Response::json( $this, 200);
    }
}
