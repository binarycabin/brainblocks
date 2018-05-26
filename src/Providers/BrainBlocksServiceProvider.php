<?php

namespace BinaryCabin\BrainBlocks\Providers;

use Illuminate\Support\ServiceProvider;
use BinaryCabin\BrainBlocks\BrainBlocks;

class BrainBlocksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/brainblocks.php' => config_path('brainblocks.php'),
        ]);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'brainblocks');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBrainBlocks();
        $this->mergeConfigFrom(
            __DIR__.'/../config/brainblocks.php', 'brainblocks'
        );
    }

    public function registerBrainBlocks(){
        $this->app->bind('brainblocks',function() {
            return new BrainBlocks();
        });
    }

    public function provides()
    {
        return array('brainblocks', BrainBlocks::class);
    }



}