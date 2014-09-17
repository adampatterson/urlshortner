<?php namespace P53\Shortener;

use Illuminate\Support\ServiceProvider;

class LittleServiceProvider extends ServiceProvider {

    /**
     * Register in IoC container
     */
    public function register()
    {
        $this->app->bind('Little', 'P53\Shortener\LittleService');
    }

}