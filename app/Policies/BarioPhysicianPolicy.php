<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BarioPhysician;
use Illuminate\Auth\Access\HandlesAuthorization;

class BarioPhysicianPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the barioPhysician can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the barioPhysician can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BarioPhysician  $model
     * @return mixed
     */
    public function view(User $user, BarioPhysician $model)
    {
        return true;
    }

    /**
     * Determine whether the barioPhysician can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the barioPhysician can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BarioPhysician  $model
     * @return mixed
     */
    public function update(User $user, BarioPhysician $model)
    {
        return true;
    }

    /**
     * Determine whether the barioPhysician can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BarioPhysician  $model
     * @return mixed
     */
    public function delete(User $user, BarioPhysician $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BarioPhysician  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the barioPhysician can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BarioPhysician  $model
     * @return mixed
     */
    public function restore(User $user, BarioPhysician $model)
    {
        return false;
    }

    /**
     * Determine whether the barioPhysician can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BarioPhysician  $model
     * @return mixed
     */
    public function forceDelete(User $user, BarioPhysician $model)
    {
        return false;
    }
}
