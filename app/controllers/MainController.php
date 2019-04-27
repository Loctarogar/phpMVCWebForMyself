<?php

namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;

class MainController extends AppController
{
    public function indexAction()
    {
        //App::$app->getList();
        $model = new Main();
        R::fancyDebug(true);
        $posts = App::$app->cache->get('posts');
        if(!$posts){
            $posts = R::findAll('posts');
            App::$app->cache->set('posts', $posts);
        }

        $categories = R::findAll('category');
        $this->set(compact('posts', 'categories'));
    }
}