<?php

namespace app\controllers;

class PostsNew extends App
{
    public function indexAction()
    {
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