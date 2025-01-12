<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class TweetController extends Controller
{    
    public function index()
    {   
        $tweets = auth()->user()->timeline();
        
        return view('tweets.index', compact('tweets'));    
    }

    public function store()
    {
        $this->validate(request(), [
            'body' => 'required|max:255'
        ]);
        
        Tweet::create([
            'user_id' => auth()->id(),
            'body'    => request('body')
        ]);    

        return back()->with('success', 'Tweet Published!');
    }

    public function destroy(Tweet $tweet)
    {                   
        // if($tweet->user_id != auth()->id()){
        //     return 'not our';
        // }
        
        $this->authorize('delete', $tweet);

        $tweet->delete();  

        return back()->with('success', 'Tweet Deleted!');
    }
}
