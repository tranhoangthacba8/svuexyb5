<?php

namespace App\Providers;

use App\Models\User;
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

        Gate::define('report.manager', function (User $user){
            if($user->roleId == 1 || $user->roleId == 3 || $user->roleId == 2){
                return true;
            }

            return false;
        });
        Gate::define('user.manager', function (User $user){
           if($user->roleId == 1 || $user->roleId == 2){
               return true;
           }

           return false;
        });
        Gate::define('project.manager', function (User $user){
            if($user->roleId == 1 || $user->roleId == 2){
                return true;
            }

            return false;
        });
        Gate::define('project-role.manager', function (User $user){
            if($user->roleId == 1 || $user->roleId == 2){
                return true;
            }

            return false;
        });
        Gate::define('view-statistic-employee', function (User $user){
            if($user->roleId == 1 || $user->roleId == 3 || $user->roleId == 2){
                return true;
            }

            return false;
        });
        Gate::define('view-statistic-manager', function (User $user){
            if($user->roleId == 1 || $user->roleId == 2){
                return true;
            }

            return false;
        });
    }
}
