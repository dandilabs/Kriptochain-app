<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('is-admin', fn($user) => $user->role === 'Admin');
        Gate::define('is-user', fn($user) => $user->role === 'User');
        Gate::define('has-active-membership', function ($user) {
            return $user->activeMembership != null;
        });

        Gate::define('no-active-membership', fn($user) => $user->activeMembership == null);
    }
}
