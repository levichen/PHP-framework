<?php

// Define system path path
$system_path = "";

if(realpath($system_path) !== false) {
    $system_path = realpath($system_path) . '/';
}

define("BASEPATH", str_replace("\\", "/", $system_path)); 

// load common functions
require(BASEPATH . "/libs/Common.php");

// load config file
require(get_file_path("paths", "config"));
require(get_file_path("database", "config"));

// Use an autoloader!
require(get_file_path("Bootstrap", "libs"));
require(get_file_path("Controller", "libs"));
require(get_file_path("Model", "libs"));
require(get_file_path("View", "libs"));
require(get_file_path("Database", "libs"));
require(get_file_path("Session", "libs"));

$app = new Bootstrap();

