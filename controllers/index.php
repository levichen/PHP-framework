<?php
class Index extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->msg = "We are in index";
        $this->view->rander('index/index');
    }
}
