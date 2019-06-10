<?php


namespace app\controllers;

use app\models\User;
use projectFiles\core\base\View;

class UserController extends AppController
{
    public function signupAction()
    {
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if($user->validate($data)){
                echo 'OK';
            }else{
                echo "not ok";
            }
            die;
        }
    }

    public function loginAction()
    {

    }
    public function logoutAction()
    {

    }
}