<?php

if(!function_exists('load_class')) {
    function load_class($class, $dir = "libs") {
        static $_classes = array();

        $filePath = BASEPATH . $dir . '/' . $class . '.php';

        if(isset($_classes[$class])) {
            return $_classes[$class];
        }

        if(file_exists($filePath)) {
            require($filePath);
            is_loaded($class);

            $_classes[$class] = new $class();
            return $_classes[$class];
        }
    }
}

if(!function_exists('is_load')) {
    function is_loaded($class) {
        static $_is_loaded = array();

        if($class != '') {
            $_is_loaded[strtolower($class)] = $class; 
        }
        return $_is_loaded[strtolower($class)];
    }
}

if(!function_exists('get_file_path')) {
    function get_file_path($fileName, $dir) {
        return BASEPATH . $dir . '/' . $fileName . '.php'; 
    }
}
