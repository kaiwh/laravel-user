<?php

namespace Kaiwh\User\Providers;

class UserServiceProvider extends \Illuminate\Support\ServiceProvider
{

    protected $commands = [
        'Kaiwh\User\Commands\UserInstallCommand',
    ];
    // public function boot()
    // {
    // }

    public function register()
    {
        $this->commands($this->commands);
    }
}
