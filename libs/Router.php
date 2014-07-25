<?php
class Router
{
    var $defaultController = "index";
    var $defaultMethod     = "index";
    var $controller;
    var $method;
    var $args;

    var $uri;

    function __construct() {
        $this->uri =& load_class("URI", "libs");
    }

    function set_routing() {
        $this->uri->fetchURL();
        $this->uri->explodeURL();

        $segments = $this->uri->getSegments();

        $this->setController($segments);
        $this->setMethod($segments);
        $this->setArgs($segments);
    }

    function setController($segments) {
        $this->controller = empty($segments[0]) ? $this->defaultController : $segments[0];    
    }

    function setMethod($segments) {
        $this->method = empty($segments[1]) ? $this->defaultMethod : $segments[1];
    }

    function setArgs($segments) {
        if(count($segments) > 2) {
            unset($segments[0]);
            unset($segments[1]);
            $this->args = $segments;
        }
        else {
            $this->args = array();
        }
    }

    function getController() {
        return $this->controller;
    }

    function getMethod() {
        return $this->method;
    }

    function getArgs() {
        return $this->args;
    }
}
