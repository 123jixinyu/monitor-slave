<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5283df4bb438cdb5b98dff64b8e811ca
{
    public static $files = array (
        '713551e3db292aa6337e414f0622297e' => __DIR__ . '/../..' . '/app/Library/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predis\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5283df4bb438cdb5b98dff64b8e811ca::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5283df4bb438cdb5b98dff64b8e811ca::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
