<?php

namespace app\controllers;

class Posts extends App
{
    //to change layout for entire Posts class
    public $layout = 'main';

    public function indexAction()
    {
        //to change layout for single method
        //$this->layout = 'mainLayout';
        //to change view for single method
        //$this->view = 'main';
        $name = 'My name';
        $hi = "Hello";
        $thirdvar = "thirdvar";
        $this->set(compact('name', 'hi', 'thirdvar'));
    }

    public function mainAction()
    {
        //if i don't want to use layout and view
        //for example if i use ajax request
        $this->layout = false;
        //and now send data
        echo 'Content from mainAction';
    }
}