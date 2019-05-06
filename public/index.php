<?php

// to show errors
//ini_set('display_errors', 1);
//error_reporting(-1);

use vendor\core\Router;

define("DEBUG", 0);

$query = rtrim($_SERVER['QUERY_STRING'], '/');

//constant for directories
//public directory
define('WWW', __DIR__);
//libs directory
define('LIBS', dirname(__DIR__).'/vendor/libs');
//constant for 'core' directory
define('CORE', dirname(__DIR__).'/vendor/core');
//'root' directory
define('ROOT', dirname(__DIR__));
//'app' directory
define('APP', dirname(__DIR__).'/app');
//default template name for layout
define('LAYOUT', 'default');
//const for cache directory
define('CACHE', dirname(__DIR__).'/tmp/cache');

require '../vendor/libs/functions.php';
//debug($_GET);
spl_autoload_register(function ($class) {
    $file = ROOT.'/'.str_replace('\\', '/', $class).'.php';
    if(is_file($file)){
        require_once $file;
    }
});

new \vendor\core\App();

Router::add('^page/?(?P<action>[a-z-]+)?/?(?P<alias>[a-z-]+)?$', ['controller' => 'Page']);
Router::add('^page/?(?P<alias>[a-z-]+)?$', ['controller' => 'Page', 'action' => 'view']);
//default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//debug(Router::getRoutes());

Router::dispatch($query);