<?php

namespace TelcoLAB\Freshdesk\Laravel;

use Illuminate\Support\ServiceProvider;
use Laravie\Codex\Discovery;
use TelcoLAB\Freshdesk\SDK\Freshdesk;

class FreshdeskServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/freshdesk.php' => config_path('freshdesk.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Freshdesk::class, function ($app) {
            return new Freshdesk(
                Discovery::client(),
                $app->config->get('freshdesk.domain'),
                $app->config->get('freshdesk.key')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Freshdesk::class];
    }
}
