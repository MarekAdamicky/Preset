<?php

namespace Adamicky\BasicPreset;

use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::cleanSassDirectory();
        static::cleanScriptsDirectory();
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateScripts();
        static::removeNodeModules();
    }

    /**
     * Clean Sass Direcotory
     *
     * @return void
     */
    public static function cleanSassDirectory()
    {
        File::cleanDirectory(resource_path('assets/sass'));
    }

    /**
     * Clean JS Direcotory
     *
     * @return void
     */
    public static function cleanScriptsDirectory()
    {
        File::cleanDirectory(resource_path('assets/js'));
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                'axios'                    => '^0.18',
                'babel-polyfill'           => '^6.26.0',
                'cross-env'                => '^5.1.5',
                'laravel-mix'              => '^2.0',
                'laravel-mix-environments' => '^0.1.2',
                'lodash'                   => '^4.17.10'
            ];
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update the scripts files.
     *
     * @return void
     */
    protected static function updateScripts()
    {
        copy(__DIR__.'/stubs/js/app.js', resource_path('assets/js/app.js'));
        copy(__DIR__.'/stubs/js/axios.js', resource_path('assets/js/axios.js'));
        copy(__DIR__.'/stubs/js/bootstrap.js', resource_path('assets/js/bootstrap.js'));
        copy(__DIR__.'/stubs/js/scripts.js', resource_path('assets/js/scripts.js'));
    }
}
