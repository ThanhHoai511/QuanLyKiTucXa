<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\MasterPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('managing_agreement', 'App\Policies\MasterPolicy');
        Gate::define('managing_agreement.create', 'App\Policies\MasterPolicy@create');
        Gate::define('managing_agreement.update', 'App\Policies\MasterPolicy@update');
        Gate::define('managing_agreement.delete', 'App\Policies\MasterPolicy@delete');
    }
}
