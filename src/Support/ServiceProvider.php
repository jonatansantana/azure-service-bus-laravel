<?php

namespace SenhorMrTroll\AzureServiceBusLaravel\Support;

use SenhorMrTroll\AzureServiceBusLaravel\AzureConnector;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $manager = $this->app['queue'];
        $this->registerConnector($manager);
    }

    private function registerConnector($manager)
    {

        $manager->addConnector('azureservicebus', function () {
            return new AzureConnector();
        });
    }

    public function provides()
    {
        return ['azureservicebus'];
    }
}
