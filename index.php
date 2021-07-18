<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/**
 * @package MVC
 */

 /**
 * Define absolute path
 */
define('ABSPATH', dirname(__FILE__));

/**
 * include vendor auto load file of the composer
 */
if( file_exists(ABSPATH . '/vendor/autoload.php') ):
    require_once ABSPATH . '/vendor/autoload.php';
endif;

/**
 * Do routing
 */
$controller = 'auth';
$action = 'index';
if(!empty($_GET))
{
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}
require_once ABSPATH . "/app/controller/$controller.php";
$route = new $controller();
$route->$action();
