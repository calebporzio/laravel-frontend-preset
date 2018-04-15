<?php

namespace CalebPorzio\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class PresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('calebporzio', function ($command) {
            Preset::install();

            $command->info('Preset installed. To finish setup, run:');
            $command->info('npm install && node_modules/.bin/tailwind init && npm run dev');
        });
    }
}
