<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit825f82f63a9c13dc655f2d1e037d4261
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit825f82f63a9c13dc655f2d1e037d4261::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit825f82f63a9c13dc655f2d1e037d4261::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit825f82f63a9c13dc655f2d1e037d4261::$classMap;

        }, null, ClassLoader::class);
    }
}