<?php

namespace app\models;

use vendor\projectFiles\core\base\Model;

class Main extends Model {
    public $table = 'posts';
    //if i need to search by other column
    public $pk = 'category_id';
}