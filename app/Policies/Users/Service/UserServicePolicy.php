<?php

namespace App\Policies\Users\Service;

use App\Models\User;
use App\Models\Users\Service\UserService;
use Illuminate\Auth\Access\Response;

class UserServicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role_id == 3 ||
            !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 10]));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserService $userService): bool
    {
        return $user->role_id == 3 ||
            !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 10]));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id == 3;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserService $userService): bool
    {
        return $user->role_id == 3;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserService $userService): bool
    {
        return $user->role_id == 3 ||
            !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 10]));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserService $userService): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 10]));
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserService $userService): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 10]));
    }
}
