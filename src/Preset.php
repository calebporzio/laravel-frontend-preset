<?php

namespace CalebPorzio\LaravelPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset as BasePreset;
use Illuminate\Support\Arr;

class Preset extends BasePreset
{
    public static function install()
    {
        static::updatePackages();
        static::webpackDotMix();
        static::gitignore();
        static::bootstrapDotJs();
        static::appDotScss();
        static::views();
    }

    protected static function updatePackageArray($packages)
    {
        return array_merge([
            'laravel-mix-tailwind' => '^0.1.0',
            'tailwindcss' => '>=0.5.2',
        ], Arr::except($packages, [
            'bootstrap',
            'jquery',
            'popper.js',
        ]));
    }

    protected static function webpackDotMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function gitignore()
    {
        copy(__DIR__ . '/stubs/gitignore-stub', base_path('.gitignore'));
    }

    protected static function bootstrapDotJs()
    {
        copy(__DIR__ . '/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    protected static function appDotScss()
    {
        $files = new Filesystem;

        $files->makeDirectory(resource_path('sass/components', 0755, true));

        $files->delete(resource_path('sass/_variables.scss'));

        copy(__DIR__ . '/stubs/app.scss', resource_path('sass/app.scss'));
        copy(__DIR__ . '/stubs/_custom-utilities.scss', resource_path('sass/_custom-utilities.scss'));
        copy(__DIR__ . '/stubs/components/_button.scss', resource_path('sass/components/_button.scss'));
    }

    protected static function views()
    {
        $files = new Filesystem;

        $files->delete(resource_path('views/welcome.blade.php'));
        $files->exists($file = resource_path('views/home.blade.php')) && $files->delete($file);

        $files->copyDirectory(__DIR__ . '/stubs/views', resource_path('views'));
    }
}
