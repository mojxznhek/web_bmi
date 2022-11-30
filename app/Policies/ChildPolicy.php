<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Child;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChildPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the child can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the child can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Child  $model
     * @return mixed
     */
    public function view(User $user, Child $model)
    {
        return true;
    }

    /**
     * Determine whether the child can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the child can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Child  $model
     * @return mixed
     */
    public function update(User $user, Child $model)
    {
        return true;
    }

    /**
     * Determine whether the child can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Child  $model
     * @return mixed
     */
    public function delete(User $user, Child $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Child  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the child can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Child  $model
     * @return mixed
     */
    public function restore(User $user, Child $model)
    {
        return false;
    }

    /**
     * Determine whether the child can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Child  $model
     * @return mixed
     */
    public function forceDelete(User $user, Child $model)
    {
        return false;
    }
}
