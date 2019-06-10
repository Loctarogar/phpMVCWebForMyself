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
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
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
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1f8403445ea29de7ecb3b40cb03a12f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1f8403445ea29de7ecb3b40cb03a12f7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
