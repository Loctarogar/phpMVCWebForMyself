<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        $posts = $model->findAll();
        $posts3 = $model->findAll();
        //if i want to search by id, or other column defined in 'Main'
        //$post = $model->findOne(2);
        //if i want define column here: ('data', 'column)
        //$post = $model->findOne('title2', 'title');
        //$data = $model->findBySql("SELECT * FROM $model->table
        //         WHERE title LIKE ?", ['%le2%']);
        $data = $model->findLike('le', 'title');
        debug($data);
        $this->set(compact('posts'));
    }
}