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
        'App\Model' => 'App\Policies\CategoriasPolicy',
        'App\Model' => 'App\Policies\SubCategoriasPolicy',
        'App\Model' => 'App\Policies\AlmacenesPolicy',
        'App\Model' => 'App\Policies\TiendasPolicy',
        'App\Model' => 'App\Policies\TercerosPolicy',
        'App\Model' => 'App\Policies\VendedoresPolicy',
        'App\Model' => 'App\Policies\CampanasPolicy',
        'App\Model' => 'App\Policies\ProductosPolicy',
        'App\Model' => 'App\Policies\PreciosPolicy',
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
    }
}
