<?php

namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;

class MainController extends AppController
{
    public function indexAction()
    {
        App::$app->getList();
        $model = new Main();
        $posts = R::findAll('posts');
        $categories = R::findAll('category');
        $this->set(compact('posts', 'categories'));
    }
}