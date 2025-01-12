<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowController extends Controller
{
    public function __invoke(User $user)
    { 
        if(auth()->user()->following($user)){
            auth()->user()->unfollow($user);

            return back()->with('success', 'Too Bad! You wont be able to chat with ' . $user->name . ' anymore! :(');
        }

        auth()->user()->follow($user);

        return back()->with('success', 'Great! You can now chat with ' . $user->name . '. :)');
    }
}
