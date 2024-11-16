<?php

namespace App\Policies\System\Info;

use App\Models\User;

class SystemInfoPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 8]));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 8]));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 8]));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 8]));
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 8]));
    }
}
