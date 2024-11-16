<?php

namespace App\Policies\Administration\App;

use App\Models\Administration\App\AppFeature;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppFeaturePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 2]));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AppFeature $appFeature): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 2]));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AppFeature $appFeature): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 2]));
    }
}
