<?php

namespace app\controllers;

use app\models\Main;
use R;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        $posts = R::findAll('posts');
        $categories = R::findAll('category');
        $this->set(compact('posts', 'categories'));
    }
}