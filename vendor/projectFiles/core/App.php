<?php

namespace vendor\projectFiles\core;

use vendor\projectFiles\core\Registry;

class App{
    public static $app;

    public function __construct()
    {
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}