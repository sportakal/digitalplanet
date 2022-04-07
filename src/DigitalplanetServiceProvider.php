<?php

namespace Sportakal\Digitalplanet;

use Illuminate\Support\ServiceProvider;

class DigitalplanetServiceProvider extends ServiceProvider
{

    protected $vendorName = "sportakal";
    protected $packageName = "digitalplanet";

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/$this->packageName.php", $this->packageName, 'digitalplanet');
    }

    /**
     * A list of artisan commands for your package.
     *
     * @var array
     */
    protected $commands = [

    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . "/../config/$this->packageName.php" => $this->app['path.config'] . DIRECTORY_SEPARATOR . $this->packageName . 'php',
        ]);

        //$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        //$this->loadMigrationsFrom(__DIR__ . '/../database/seeds');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
    }

    protected function bootForConsole()
    {
        // Publishing the configuration file
        $this->publishes([
            __DIR__ . '/../config/' . $this->packageName . '.php' => config_path($this->packageName . '.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        /**
         * // Publishing the translation files
         * $this->publishes([
         * __DIR__ . '/../resources/lang' => resource_path('lang/vendor/' . $this->vendorName . '/' . $this->packageName),
         * ], 'translations');
         *
         * // Publishing migration's
         * $this->publishes([
         * __DIR__.'/../migrations' => base_path('/migrations'),
         * ], 'auth-migrations');
         *
         * // Publishing seed's
         * $this->publishes([
         * __DIR__.'/../database' => base_path('/database'),
         * ], 'auth-seeds');
         **/
    }
}
