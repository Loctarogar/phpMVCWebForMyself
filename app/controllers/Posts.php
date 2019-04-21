<?php

namespace app\controllers;

use vendor\core\base\Controller as Controller;

class Posts extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function indexAction()
    {
        debug($this->route);
        echo "</br>Posts index method <h3>Works</h3></br>";
    }
}