<?php

class Router{
    //all routes
    protected static $routes = [];
    //one route
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
        //print_r($route);
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public function getRoute(){
        return self::$route;
    }
}