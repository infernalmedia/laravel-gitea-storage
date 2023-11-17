<?php

namespace InfernalMedia\LaravelGiteaStorage;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use InfernalMedia\FlysystemGitea\Client;
use InfernalMedia\FlysystemGitea\GiteaAdapter;
use League\Flysystem\Filesystem;

class GiteaStorageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        Storage::extend('gitea', function ($app, $config) {
            $client = new Client(
                $config['username'],
                $config['repository'],
                $config['branch'],
                $config['base-url'],
                $config['personal-access-token']
            );

            $adapter = new GiteaAdapter($client);
            $operator = new Filesystem($adapter);

            return new FilesystemAdapter($operator, $adapter);
        });
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        //
    }
}
