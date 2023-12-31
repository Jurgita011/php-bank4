<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48477c459ad47564ffdecdb34dd73a8c
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bank\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bank\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit48477c459ad47564ffdecdb34dd73a8c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48477c459ad47564ffdecdb34dd73a8c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit48477c459ad47564ffdecdb34dd73a8c::$classMap;

        }, null, ClassLoader::class);
    }
}
