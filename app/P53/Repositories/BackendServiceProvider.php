<?php namespace P53\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    /**
     * Register bindings with IoC container
     */
    public function register()
    {
        $this->app->bind(
            'P53\Repositories\LinkRepositoryInterface',
            'P53\Repositories\DbLinkRepository'
        );
    }
}