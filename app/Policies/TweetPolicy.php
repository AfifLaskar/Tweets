<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tweet;

class TweetPolicy
{
    public function delete(User $user, Tweet $tweet)
    {  
        return $user->id === $tweet->user_id;
    }
}
