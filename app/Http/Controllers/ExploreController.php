<?php

namespace App\Http\Controllers;

use App\Models\User;

class ExploreController extends Controller
{    
    public function __invoke()
    {
        $users = User::paginate(20);

        return view('explore.index', compact('users'));    
    }
}
