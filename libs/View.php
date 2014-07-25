<?php
class View {
    public function __construct() {
    }

    public function rander($viewname, $noInclude = false) {
        if($noInclude == true) {
            require "views/" . $viewname . ".php"; 
        }
        else {
            require "views/header.php";
            require "views/" . $viewname . ".php"; 
            require "views/footer.php";
        }
    }
}
