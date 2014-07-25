<?php
class Bootstrap {
    var $uri;
    var $router;

    public function __construct() {
        $this->uri =& load_class("URI", "libs");

        $this->uri->fetchURL();
        $this->uri->explodeURL();

        $this->router =& load_class("Router", "libs"); 
        $this->router->set_routing();

        $controller = $this->loadController();
        if($controller != false) {
            $this->loadMethod($controller);
        }
    }

    function loadController() {
        $controllerName = $this->router->getController();
        $controllerPath = get_file_path($controllerName, "controllers");

        if(file_exists($controllerPath)) {
            require($controllerPath);
            $controller = new $controllerName;
            return $controller;
        }
        else {
            $this->showError("Not found controller.");
            return false;
        }
    }

    function loadMethod($controller) {
        $methodName = $this->router->getMethod();
        $args       = $this->router->getArgs();

        if(method_exists($controller, $methodName)) {
            call_user_func_array(array($controller, $methodName), $args); 
        }
        else {
            $this->showError("Not found method.");
        }
    }

    public function showError($msg) {
        require("controllers/error.php");
        $controller = new Error();
        $controller->showErrorPage($msg);
    }
}


