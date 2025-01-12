<?php

namespace App\Http\Livewire\Timeline;

use App\Models\Tweet;
use Livewire\Component;

class Tweets extends Component
{
    protected $listeners = [
        'storeTweet'
    ];

    public function storeTweet(){}

    public function like($id)
    {
        $tweet = Tweet::findOrFail($id);

        if($tweet->isLikedByOwner()){
            $tweet->isLikedByOwner()->delete();

            $this->dispatchBrowserEvent('toastr:success', [
                'message' => 'Your like was removed!'
            ]);
        } else {
            $tweet->like();

            $this->dispatchBrowserEvent('toastr:success', [
                'message' => 'Tweet Liked!'
            ]);
        }        
    }

    public function dislike($id)
    {
        $tweet = Tweet::findOrFail($id);

        if($tweet->isDislikedByOwner()){
            $tweet->isDislikedByOwner()->delete();

            $this->dispatchBrowserEvent('toastr:success', [
                'message' => 'Your dislike was removed!'
            ]);
        } else {
            $tweet->dislike();

            $this->dispatchBrowserEvent('toastr:success', [
                'message' => 'Tweet Disliked!'
            ]);
        }
    }

    public function delete($id)
    {
        $tweet = Tweet::findOrFail($id);

        $tweet->delete();

        $this->dispatchBrowserEvent('toastr:success', [
            'message' => 'Tweet Deleted!'
        ]);
    }

    public function render()
    {
        $tweets = auth()->user()->timeline();

        return view('livewire.timeline.tweets', compact('tweets'));
    }
}
