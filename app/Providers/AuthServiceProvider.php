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
        Gate::define('thisisAdmin',function ($user)
        {
            return $user->email=='admin@admin.com';

        });
        //
        Gate::define('thisisMember',function ($user)
        {
//            return $user->id != 1;
            return $user->email!='admin@admin.com';

        });
    }
}
