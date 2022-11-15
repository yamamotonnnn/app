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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 「admin」だけに適用
        Gate::define('admin_only', function ($user) {
            return ($user->permission_id == 1);
        });

        // 「all」に適用
        Gate::define('all', function ($user) {
            return ($user->permission_id <= 2);
        });
    }
}
