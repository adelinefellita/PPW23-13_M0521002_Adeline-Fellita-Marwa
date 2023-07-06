<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('add-menu', function (User $user) {
            return $user->role === 'manager';
        });

        /*
        Gate::define('isAdmin', function (User $user) {
            return $role->is_admin == true;
        });

        Gate::define('isManager', function (User $user) {
            return $role->id == false;
        });
        */
    }
}
