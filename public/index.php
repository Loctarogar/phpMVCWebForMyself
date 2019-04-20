<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');

//constant for current directory
define('WWW', __DIR__);
//constant for 'core' directory
define('CORE', dirname(__DIR__).'/vendor/core');
//'root' directory
define('ROOT', dirname(__DIR__));
//'app' directory
define('APP', dirname(__DIR__).'/app');

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

//require '../app/controllers/Main.php';
//require '../app/controllers/Posts.php';
//require '../app/controllers/PostsNew.php';

spl_autoload_register(function ($class) {
    $file = APP."/controllers/$class.php";
    if(is_file($file)){
        require_once $file;
    }
});

Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Main']);

//default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);