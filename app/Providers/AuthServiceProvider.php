<?php

namespace App\Providers;

use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        Gate::define('ADMIN', function(User $user) {
            if ($user->jabatan == 'Admin') {
                // dd($user->jabatan);
                return true;
            } else {
                return false;
            }
        });

        Gate::define('Supervisor', function(User $user) {
            if ($user->jabatan == 'Supervisor') {
                // dd($user->jabatan);
                return true;
            } else {
                return false;
            }
        });

        Gate::define('Maintenance', function(User $user) {
            if ($user->jabatan == 'Maintenance') {
                // dd($user->jabatan);
                return true;
            } else {
                return false;
            }
        });

        Gate::define('RepairMan', function(User $user) {
            if ($user->jabatan == 'RepairMan') {
                // dd($user->jabatan);
                return true;
            } else {
                return false;
            }
        });
        
    }
}
