<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


use App\Gates\Purchese_ManagerGate;
use App\Gates\Salse_ManagerGate;
use App\Gates\Normal_UserGate;
use App\Gates\AdminGate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//    oe way to write
        // 'App\Models\Suplier' => 'App\Policies\SuplierPolicy',
// another way to write
        Suplier::class => SuplierPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('Salse_Manager',function($user){
        //     if($user->user_type ==='Salse Manager'){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // });
        //
        //it execute from here so we hae to mantion it here and separet the code
        Gate::define('Purchese_Manager',[Purchese_ManagerGate::class, 'check_purchese_manager']);
        Gate::define('Salse_Manager',[Salse_ManagerGate::class, 'check_salse_manager']);
        Gate::define('Normal_User',[Normal_UserGate::class, 'check_normal_userr']);
        Gate::define('Admin',[AdminGate::class, 'check_admin']);
    }
}
