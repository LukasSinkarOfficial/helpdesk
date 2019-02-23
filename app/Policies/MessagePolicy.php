<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;
use App\Message;

class MessagePolicy
{
    use HandlesAuthorization;

    public function view(Post $post)
    {
        
    }
}
