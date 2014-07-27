<?php
class Login extends Controller{
    public function __construct() {
        parent::__construct();
        $this->model = $this->loadModel("login_model");
    }

    public function index() {
        if(Session::get("isLogin")) {
            header("Location:" . URL . "dashboard"); 
        }
        else {
        
            $this->view->rander('login/index');
        }
    }

    public function loginDo() {
        $account  = $_POST['account'];
        $password = $_POST['password'];
        
        $isLoginSuccess = $this->model->loginDo($account, $password);

        if($isLoginSuccess) {
            Session::set("isLogin", TRUE);     
            header('Location:' . URL . "dashboard");
        }
        else {
            Session::destroy(); 
            header('Location:' . URL . "login");
        }
    }
}
