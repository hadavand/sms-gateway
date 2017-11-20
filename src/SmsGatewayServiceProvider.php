<?php

namespace Hadavand\SmsGateway;

use Illuminate\Support\ServiceProvider;

class SmsGatewayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();

        $this->app->bind(SmsGatewayInterface::class, ShetabSystemSmsGateway::class);
    }

    private function mergeConfig()
    {
        $path = $this->getConfigPath();
        $this->mergeConfigFrom($path, 'sms_gateway');
    }

    private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([ $path => config_path('sms_gateway.php') ], 'config');
    }

    private function getConfigPath()
    {
        return __DIR__ . '/../config/sms-gateway.php';
    }
}
