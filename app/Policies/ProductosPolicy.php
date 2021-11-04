<?php

namespace App\Policies;

use App\Productos;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Productos  $productos
     * @return mixed
     */
    public function view(User $user, Productos $productos)
    {
        return $user->empresa_id == $productos->empresa_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Productos  $productos
     * @return mixed
     */
    public function update(User $user, Productos $productos)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Productos  $productos
     * @return mixed
     */
    public function delete(User $user, Productos $productos)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Productos  $productos
     * @return mixed
     */
    public function restore(User $user, Productos $productos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Productos  $productos
     * @return mixed
     */
    public function forceDelete(User $user, Productos $productos)
    {
        //
    }
}
