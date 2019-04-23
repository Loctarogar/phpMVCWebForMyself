<?php

namespace app\controllers;

use vendor\core\base\Controller;

class Posts extends Controller
{
    public function indexAction()
    {
        //debug($this->route);
        echo "</br>Posts index method <h3>Works</h3></br>";
    }
}