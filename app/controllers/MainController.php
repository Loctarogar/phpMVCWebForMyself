<?php

namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        $posts = R::findAll('posts');
        $post = R::findOne('posts', 'id = 2');
        $categories = R::findAll('category');
        $this->set(compact('posts', 'categories', 'post'));
    }

    public function testAction(){
        $model = new Main();
        if($this->isAjax()){
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            //using name with underscore '_' for ajax files
            $this->loadView('_test', compact('post'));
            die;
        }
        echo "Not an Ajax";
        die;
        //$this->layout = 'test';
    }
}