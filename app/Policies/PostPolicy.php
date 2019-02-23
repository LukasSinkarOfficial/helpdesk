<?php

namespace App\Policies;

use App\User;
use App\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;
use Auth;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function viewEmployee(User $user)
    {
        return $user->id->isNotEmpty();
    }
}
