<?php


namespace app\models;


use projectFiles\core\base\Model;

class User extends Model
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
//        'role' => 'user',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],

        'email' => [
            ['email'],
        ],

        'lengthMin' => [
            ['password', 6],
        ]
    ];

    public function checkUnique()
    {
        $user = \R::findOne('user', 'login = ? OR email = ? LIMIT 1', [$this->attributes['login'], $this->attributes['email']]);
        if($user){
            if($user->login == $this->attributes['login']){
                $this->errors['unique'][] = "You can't use this login";
            }
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = "You can't use this email";
            }

            return false;
        }

        return true;
    }
}