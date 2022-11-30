<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HealthTips;
use Illuminate\Auth\Access\HandlesAuthorization;

class HealthTipsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the healthTips can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the healthTips can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthTips  $model
     * @return mixed
     */
    public function view(User $user, HealthTips $model)
    {
        return true;
    }

    /**
     * Determine whether the healthTips can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the healthTips can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthTips  $model
     * @return mixed
     */
    public function update(User $user, HealthTips $model)
    {
        return true;
    }

    /**
     * Determine whether the healthTips can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthTips  $model
     * @return mixed
     */
    public function delete(User $user, HealthTips $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthTips  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the healthTips can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthTips  $model
     * @return mixed
     */
    public function restore(User $user, HealthTips $model)
    {
        return false;
    }

    /**
     * Determine whether the healthTips can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthTips  $model
     * @return mixed
     */
    public function forceDelete(User $user, HealthTips $model)
    {
        return false;
    }
}
