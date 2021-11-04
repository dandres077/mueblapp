<?php

namespace App\Policies;

use App\User;
use App\Vendedores;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendedoresPolicy
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
     * @param  \App\Vendedores  $vendedores
     * @return mixed
     */
    public function view(User $user, Vendedores $vendedores)
    {
        return $user->empresa_id == $vendedores->empresa_id;
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
     * @param  \App\Vendedores  $vendedores
     * @return mixed
     */
    public function update(User $user, Vendedores $vendedores)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vendedores  $vendedores
     * @return mixed
     */
    public function delete(User $user, Vendedores $vendedores)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vendedores  $vendedores
     * @return mixed
     */
    public function restore(User $user, Vendedores $vendedores)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vendedores  $vendedores
     * @return mixed
     */
    public function forceDelete(User $user, Vendedores $vendedores)
    {
        //
    }
}
