<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // super-admin ও admin সব user দেখতে পারবে
        return $user->hasAnyRole(['super-admin', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin'])
            || $user->id === $model->id;
        // super-admin & admin যেকোনো user দেখতে পারবে
        // অন্য সবাই শুধু নিজের প্রোফাইল দেখতে পারবে
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin']);
        // শুধু super-admin ও admin নতুন user create করতে পারবে
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'editor'])
            || $user->id === $model->id;
        // super-admin, admin, editor অন্যদের update করতে পারবে
        // patient / hospital শুধু নিজের প্রোফাইল update করতে পারবে
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin']);
        // শুধু super-admin ও admin delete করতে পারবে
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->hasRole('super-admin');
        // শুধু super-admin restore করতে পারবে
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->hasRole('super-admin');
        // শুধু super-admin permanently delete করতে পারবে
    }
}
