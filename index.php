<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// load configuration and helper functions 
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib'  . DS . 'helpers' . DS . 'functions.php');

// autoload classes 
 // TODO Change requie once to require because dont check every time but only first time require
function my_autoloader($className) {
	if(file_exists(ROOT . DS . 'core' . DS . $className . '.php')){
		require_once(ROOT . DS . 'core' . DS . $className . '.php');
	}elseif(file_exists(ROOT . DS . 'app' . DS .'controllers' . DS . $className . '.php')){
		require_once(ROOT . DS . 'app' . DS .'controllers' . DS . $className . '.php');
	}elseif(file_exists(ROOT . DS . 'app' . DS .'models' . DS . $className . '.php')){
		require_once(ROOT . DS . 'app' . DS .'models' . DS . $className . '.php');
	}
} 
	spl_autoload_register('my_autoloader');
// end of function autoload
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
// $db = DB::getInstance();
// dd($db);
// Route the request 
Router::route($url);