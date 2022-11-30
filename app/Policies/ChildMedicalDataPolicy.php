<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ChildMedicalData;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChildMedicalDataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the childMedicalData can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the childMedicalData can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildMedicalData  $model
     * @return mixed
     */
    public function view(User $user, ChildMedicalData $model)
    {
        return true;
    }

    /**
     * Determine whether the childMedicalData can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the childMedicalData can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildMedicalData  $model
     * @return mixed
     */
    public function update(User $user, ChildMedicalData $model)
    {
        return true;
    }

    /**
     * Determine whether the childMedicalData can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildMedicalData  $model
     * @return mixed
     */
    public function delete(User $user, ChildMedicalData $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildMedicalData  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the childMedicalData can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildMedicalData  $model
     * @return mixed
     */
    public function restore(User $user, ChildMedicalData $model)
    {
        return false;
    }

    /**
     * Determine whether the childMedicalData can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ChildMedicalData  $model
     * @return mixed
     */
    public function forceDelete(User $user, ChildMedicalData $model)
    {
        return false;
    }
}
