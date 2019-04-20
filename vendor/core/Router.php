<?php

class Router{
    /**
     * all routes
     * @var array
     */
    protected static $routes = [];

    /**
     * current rout
     * @var array
     */
    protected static $route = [];

    /**
     * adds route to $routes
     *
     * @param $regexp
     * @param array $route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
        //print_r($route);
    }

    /*
     * returns all routes
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * returns current route
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * searches for URL in $routes
     *
     * @param $url
     * @return bool
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#$pattern#i", $url, $matches)){
                foreach ($matches as $k => $v) {
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                debug($route);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     *
     * @param $url
     */
    public static function dispatch($url)
    {
        if(self::matchRoute($url)){
            $controller = self::upperCamelCase(self::$route['controller']);
            if(class_exists($controller)){
                $cObj = new $controller;
                $action = self::loverCamelCase(self::$route['action'])."Action";
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                }else{
                    echo "Method ".$controller." ".$action." doesn\'t found";
                }
            }else{
                echo 'Error: Controller doesn\'t exists';
            }
        }else{
            http_response_code(404);
            include '404.html';
        }
    }

    protected static function upperCamelCase($name)
    {
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }

    protected static function loverCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }
}