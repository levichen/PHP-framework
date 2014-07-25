<?php
class Help extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->msg = "We are in help page";
        $this->view->rander('help/index');
    }

    public function other($arg = false) {
        /*echo "We are inside other</br>";
        echo "Optional: " . $arg . "<br>";*/

        require "models/help_model.php";

        $model = new Help_model();
        $this->view->msg = $model->blah();
        $this->view->rander('help/index');
    }
}
