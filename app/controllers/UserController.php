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
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'],
                 PASSWORD_DEFAULT);
            if($user->save('user')){
                $_SESSION['success'] = 'You successfully signed up';
            }else{
                $_SESSION['error'] = 'Error';
            }
            redirect();
        }
    }

    public function loginAction()
    {

    }
    public function logoutAction()
    {

    }
}