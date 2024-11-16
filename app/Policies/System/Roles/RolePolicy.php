<?php

namespace App\Policies\System\Roles;

use App\Models\System\Roles\Role;
use App\Models\User;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 5]));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 5]));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 5]));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 5]));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 5]));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 5]));
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 5]));
    }
}
