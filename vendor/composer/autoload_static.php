<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1f8403445ea29de7ecb3b40cb03a12f7
{
    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'projectFiles\\' => 13,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'projectFiles\\' => 
        array (
            0 => __DIR__ . '/..' . '/projectFiles',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'app\\controllers\\AppController' => __DIR__ . '/../..' . '/app/controllers/AppController.php',
        'app\\controllers\\MainController' => __DIR__ . '/../..' . '/app/controllers/MainController.php',
        'app\\controllers\\PageController' => __DIR__ . '/../..' . '/app/controllers/PageController.php',
        'app\\controllers\\PostsController' => __DIR__ . '/../..' . '/app/controllers/PostsController.php',
        'app\\controllers\\PostsNewController' => __DIR__ . '/../..' . '/app/controllers/PostsNewController.php',
        'app\\controllers\\admin\\AppController' => __DIR__ . '/../..' . '/app/controllers/admin/AppController.php',
        'app\\controllers\\admin\\TestController' => __DIR__ . '/../..' . '/app/controllers/admin/TestController.php',
        'app\\controllers\\admin\\UserController' => __DIR__ . '/../..' . '/app/controllers/admin/UserController.php',
        'app\\models\\Main' => __DIR__ . '/../..' . '/app/models/Main.php',
        'projectFiles\\core\\App' => __DIR__ . '/..' . '/projectFiles/core/App.php',
        'projectFiles\\core\\Db' => __DIR__ . '/..' . '/projectFiles/core/Db.php',
        'projectFiles\\core\\ErrorHandler' => __DIR__ . '/..' . '/projectFiles/core/ErrorHandler.php',
        'projectFiles\\core\\Registry' => __DIR__ . '/..' . '/projectFiles/core/Registry.php',
        'projectFiles\\core\\Router' => __DIR__ . '/..' . '/projectFiles/core/Router.php',
        'projectFiles\\core\\TSingletone' => __DIR__ . '/..' . '/projectFiles/core/TSingletone.php',
        'projectFiles\\core\\base\\Controller' => __DIR__ . '/..' . '/projectFiles/core/base/Controller.php',
        'projectFiles\\core\\base\\Model' => __DIR__ . '/..' . '/projectFiles/core/base/Model.php',
        'projectFiles\\core\\base\\View' => __DIR__ . '/..' . '/projectFiles/core/base/View.php',
        'projectFiles\\libs\\Cache' => __DIR__ . '/..' . '/projectFiles/libs/Cache.php',
        'projectFiles\\libs\\Test' => __DIR__ . '/..' . '/projectFiles/libs/Test.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1f8403445ea29de7ecb3b40cb03a12f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1f8403445ea29de7ecb3b40cb03a12f7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1f8403445ea29de7ecb3b40cb03a12f7::$classMap;

        }, null, ClassLoader::class);
    }
}