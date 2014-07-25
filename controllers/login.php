<?php
class Login extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->msg = "We are in login page";
        $this->view->rander('login/index');
    }
}
