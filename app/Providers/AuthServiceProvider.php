<?php

namespace App\Providers;

use App\Models\Producto;
use App\Models\Empleado;
use App\Models\User;
use App\Policies\ProductoPolicy;
use App\Policies\EmpleadoPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Producto::class => ProductoPolicy::class,
        Empleado::class => EmpleadoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('editar-producto', function (User $user, Producto $producto) {
            return $user->id === $producto->user_id
                ? Response::allow()
                : Response::deny('No puedes editar este producto.');
        });
    }
}
