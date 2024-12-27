<?php

namespace App\Policies\System\CustomerService;

use App\Models\System\CustomerService\CustomerCard;
use App\Models\User;

class CustomerCardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role_id == 3 ||
            !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 12]));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CustomerCard $customerCard): bool
    {
        return $user->role_id == 3 ||
            !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 12]));
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
    public function update(User $user, CustomerCard $customerCard): bool
    {
        return $user->role_id == 3;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CustomerCard $customerCard): bool
    {
        return $user->role_id == 3 ||
            !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 12]));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CustomerCard $customerCard): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 12]));
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CustomerCard $customerCard): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 12]));
    }
}
