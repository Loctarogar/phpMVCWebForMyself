<?php

namespace projectFiles\core;

use projectFiles\core\Registry;

class App{
    public static $app;

    public function __construct()
    {
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}