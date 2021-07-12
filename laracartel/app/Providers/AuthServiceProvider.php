<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-users', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('delete-users', function ($user) {
            return $user->hasPermission(['jefe']);
        });

        Gate::define('manage-users', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('edit-client', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('delete-client', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('manage-clients', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('add-transport', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('edit-transport', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('delete-transport', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('manage-transports', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

    }
}
