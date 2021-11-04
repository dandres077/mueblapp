<?php

namespace App\Policies;

use App\Terceros;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TercerosPolicy
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
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function view(User $user, Terceros $terceros)
    {
        return $user->empresa_id == $terceros->empresa_id;
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
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function update(User $user, Terceros $terceros)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function delete(User $user, Terceros $terceros)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function restore(User $user, Terceros $terceros)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Terceros  $terceros
     * @return mixed
     */
    public function forceDelete(User $user, Terceros $terceros)
    {
        //
    }
}
