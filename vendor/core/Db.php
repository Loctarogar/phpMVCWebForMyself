<?php

namespace vendor\core;
use R;

class Db{

    use TSingletone;

    protected $pdo;
    //protected static $instance;
    //count sqlQueries
    public static $countSql = 0;
    //save queries in array
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT.'/config/config_db.php';
        require LIBS.'/rb-mysql.php';
        R::setup($db['dsn'], $db['user'],$db['pass']);
        R::freeze(true);
    }

    /**
    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
     */
}