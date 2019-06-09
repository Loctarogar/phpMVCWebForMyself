<?php


namespace app\controllers\admin;


use projectFiles\core\base\View;

class UserController extends AppController
{
    public function indexAction(){
        $test = "test var";
        $this->set(
          ["test" => $test]
        );
    }

    public function testAction(){
    }
}
