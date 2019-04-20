<?php


class PostsNew
{
    public function __construct()
    {
        echo "PostsNew class";
    }

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