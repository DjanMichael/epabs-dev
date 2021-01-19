<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
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

        //
        Passport::routes();

        Passport::personalAccessClientSecret(config('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'));
        Passport::personalAccessClientId(config('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'));
        // Passport::personalAccessClientId(
        //     config('passport.personal_access_client.id')
        // );

        // Passport::personalAccessClientSecret(
        //     config('passport.personal_access_client.secret')
        // );
    }
}
