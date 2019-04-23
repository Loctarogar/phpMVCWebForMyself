<?php

// to show errors
ini_set('display_errors', 1);
error_reporting(-1);

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

//constant for current directory
define('WWW', __DIR__);
//constant for 'core' directory
define('CORE', dirname(__DIR__).'/vendor/core');
//'root' directory
define('ROOT', dirname(__DIR__));
//'app' directory
define('APP', dirname(__DIR__).'/app');

require '../vendor/libs/functions.php';
debug($_GET);
spl_autoload_register(function ($class) {
    $file = ROOT.'/'.str_replace('\\', '/', $class).'.php';

    if(is_file($file)){
        require_once $file;
    }else{
        echo 'debug($class) wasn\'t found;';
        debug($class);
    }
});

Router::add('^page/?(?P<action>[a-z-]+)?/?(?P<alias>[a-z-]+)?$', ['controller' => 'Page']);
Router::add('^page/?(?P<alias>[a-z-]+)?$', ['controller' => 'Page', 'action' => 'view']);
//default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);