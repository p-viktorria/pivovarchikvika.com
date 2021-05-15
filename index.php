<?php
//FRONT CONTROLLER
ini_set('display_errors',1);
//error_reporting(E_ALL);
error_reporting(0);
//Общие настройки
session_start();
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');

//Вызов Router
$router = new Router();
$router->run();