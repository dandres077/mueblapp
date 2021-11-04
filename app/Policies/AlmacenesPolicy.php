<?php

namespace App\Policies;

use App\Almacenes;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlmacenesPolicy
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
     * @param  \App\Almacenes  $almacenes
     * @return mixed
     */
    public function view(User $user, Almacenes $almacenes)
    {
        return $user->empresa_id == $almacenes->empresa_id;
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
     * @param  \App\Almacenes  $almacenes
     * @return mixed
     */
    public function update(User $user, Almacenes $almacenes)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Almacenes  $almacenes
     * @return mixed
     */
    public function delete(User $user, Almacenes $almacenes)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Almacenes  $almacenes
     * @return mixed
     */
    public function restore(User $user, Almacenes $almacenes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Almacenes  $almacenes
     * @return mixed
     */
    public function forceDelete(User $user, Almacenes $almacenes)
    {
        //
    }
}
