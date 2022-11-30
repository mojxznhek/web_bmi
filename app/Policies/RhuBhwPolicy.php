<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RhuBhw;
use Illuminate\Auth\Access\HandlesAuthorization;

class RhuBhwPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rhuBhw can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the rhuBhw can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RhuBhw  $model
     * @return mixed
     */
    public function view(User $user, RhuBhw $model)
    {
        return true;
    }

    /**
     * Determine whether the rhuBhw can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the rhuBhw can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RhuBhw  $model
     * @return mixed
     */
    public function update(User $user, RhuBhw $model)
    {
        return true;
    }

    /**
     * Determine whether the rhuBhw can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RhuBhw  $model
     * @return mixed
     */
    public function delete(User $user, RhuBhw $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RhuBhw  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the rhuBhw can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RhuBhw  $model
     * @return mixed
     */
    public function restore(User $user, RhuBhw $model)
    {
        return false;
    }

    /**
     * Determine whether the rhuBhw can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RhuBhw  $model
     * @return mixed
     */
    public function forceDelete(User $user, RhuBhw $model)
    {
        return false;
    }
}
