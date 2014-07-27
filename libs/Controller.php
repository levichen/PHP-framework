<?php
class Controller {
    public function __construct() {
       $this->view = new View();
       Session::init();
    }

    function loadModel($modelName) {
        $filePath = BASEPATH . "models/" . $modelName . ".php";

        if(file_exists($filePath)) {
            require($filePath);
            return new $modelName; 
        }
        else {
            return false;
        }
    }
}
