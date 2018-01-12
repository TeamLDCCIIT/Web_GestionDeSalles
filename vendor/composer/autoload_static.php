<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf82dc5f23bd5deb4a827fec8ba3cfd9
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/../..' . '/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcf82dc5f23bd5deb4a827fec8ba3cfd9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcf82dc5f23bd5deb4a827fec8ba3cfd9::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitcf82dc5f23bd5deb4a827fec8ba3cfd9::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
