<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HealthCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class HealthCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the healthCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the healthCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthCategory  $model
     * @return mixed
     */
    public function view(User $user, HealthCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the healthCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the healthCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthCategory  $model
     * @return mixed
     */
    public function update(User $user, HealthCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the healthCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthCategory  $model
     * @return mixed
     */
    public function delete(User $user, HealthCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the healthCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthCategory  $model
     * @return mixed
     */
    public function restore(User $user, HealthCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the healthCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HealthCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, HealthCategory $model)
    {
        return false;
    }
}
