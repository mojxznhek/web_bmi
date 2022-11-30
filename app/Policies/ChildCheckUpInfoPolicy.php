<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ChildCheckUpInfo;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChildCheckUpInfoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the childCheckUpInfo can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the childCheckUpInfo can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildCheckUpInfo  $model
     * @return mixed
     */
    public function view(User $user, ChildCheckUpInfo $model)
    {
        return true;
    }

    /**
     * Determine whether the childCheckUpInfo can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the childCheckUpInfo can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildCheckUpInfo  $model
     * @return mixed
     */
    public function update(User $user, ChildCheckUpInfo $model)
    {
        return true;
    }

    /**
     * Determine whether the childCheckUpInfo can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildCheckUpInfo  $model
     * @return mixed
     */
    public function delete(User $user, ChildCheckUpInfo $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildCheckUpInfo  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the childCheckUpInfo can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildCheckUpInfo  $model
     * @return mixed
     */
    public function restore(User $user, ChildCheckUpInfo $model)
    {
        return false;
    }

    /**
     * Determine whether the childCheckUpInfo can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildCheckUpInfo  $model
     * @return mixed
     */
    public function forceDelete(User $user, ChildCheckUpInfo $model)
    {
        return false;
    }
}
