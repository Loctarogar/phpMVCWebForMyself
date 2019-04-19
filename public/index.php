<?php

#$uri = $_SERVER['REQUEST_URI'];
#print_r($uri);

require '../vendor/core/Router.php';

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);

print_r(Router::getRoutes());