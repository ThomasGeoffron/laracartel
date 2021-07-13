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

        Gate::define('add-client', function ($user) {
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
            return $user->hasPermission(['jefe', 'encargado', 'repartidor']);
        });

        Gate::define('edit-transport', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'repartidor']);
        });

        Gate::define('delete-transport', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('manage-transports', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'repartidor']);
        });

        Gate::define('add-arme', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía']);
        });

        Gate::define('edit-arme', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía']);
        });

        Gate::define('delete-arme', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('manage-armes', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía']);
        });

        Gate::define('add-produit', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía', 'camello']);
        });

        Gate::define('edit-produit', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía', 'camello']);
        });

        Gate::define('delete-produit', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('manage-produits', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía', 'camello']);
        });

        Gate::define('add-entrepot', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('edit-entrepot', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('delete-entrepot', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('manage-entrepots', function ($user) {
            return $user->hasPermission(['jefe', 'encargado']);
        });

        Gate::define('add-stock', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía']);
        });

        Gate::define('edit-stock', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía']);
        });

        Gate::define('delete-stock', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía']);
        });

        Gate::define('manage-stocks', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'vigía']);
        });

        Gate::define('add-vente', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'camello']);
        });

        Gate::define('edit-vente', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'camello']);
        });

        Gate::define('delete-vente', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'camello']);
        });

        Gate::define('manage-ventes', function ($user) {
            return $user->hasPermission(['jefe', 'encargado', 'camello']);
        });

    }
}
