<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5fbe7cc8dc564d176368e365b22a9479
{
    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'databases\\' => 10,
        ),
        'A' => 
        array (
            'App\\Category\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'databases\\' => 
        array (
            0 => __DIR__ . '/../..' . '/databases',
        ),
        'App\\Category\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/category',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5fbe7cc8dc564d176368e365b22a9479::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5fbe7cc8dc564d176368e365b22a9479::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
