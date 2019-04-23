<?php

namespace app\controllers;

use vendor\core\base\Controller;

class PostsNew extends Controller
{
    public function indexAction()
    {
        echo "PostsNew index method";
    }

    public function anotherAction()
    {
        echo "PostsNew another method";
    }

    public function anotherPageAction()
    {
        echo "PostsNew anotherPage method";
    }

    public function before()
    {
        echo "Before method";
    }
}