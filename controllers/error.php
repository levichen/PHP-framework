<?php
class Error extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function showErrorPage($msg) {
        $this->view->msg = $msg; 
        $this->view->rander('error/index');
    }
}
