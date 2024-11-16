<?php

namespace App\Policies\Administration\Article;

use App\Models\Administration\Article\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 9]));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 9]));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 9]));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 9]));
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        return !empty(array_intersect($user->role->abilities->pluck('id')->toArray(), [1, 9]));
    }
}
