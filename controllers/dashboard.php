<?php
class dashboard extends Controller{
    public function __construct() {
        parent::__construct();
        if(!Session::get("isLogin")) {
            header("Location" . URL . "login");
        }
    }

    function index() {
        $this->view->rander("dashboard/index");
    }

}
