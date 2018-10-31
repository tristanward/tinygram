<?php

namespace Tristanward\Tinygram\Providers;

use Tristanward\Tinygram\Tinygram;
use Illuminate\Support\ServiceProvider;

class TinygramServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('Tinygram', Tinygram::class);

        $this->publishConfigs();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            $this->getConfigsPath(),
            'tinygram'
        );
    }

    /**
     * Publish configuration file.
     *
     * @return void
     */
    private function publishConfigs()
    {
        $this->publishes([
            $this->getConfigsPath() => config_path('tinygram.php'),
        ], 'config');
    }

    /**
     * Get local package configuration path.
     *
     * @return string
     */
    private function getConfigsPath()
    {
        return __DIR__.'/../Config/tinygram.php';
    }
}
