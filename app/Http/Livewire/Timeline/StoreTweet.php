<?php

namespace App\Http\Livewire\Timeline;

use Livewire\Component;

class StoreTweet extends Component
{
    public $body;
    public $characters = 255;

    protected $rules = [
        'body' => 'required|string|max:255|min:3'
    ];

    public function charactersRemaining()
    {
        $this->characters = 255 - strlen($this->body);
    }

    public function store()
    {
        $this->validate();  

        $tweet = auth()->user()->tweets()->create([
            'body' => $this->body
        ]);        

        $this->emit('storeTweet', $tweet->id);

        $this->dispatchBrowserEvent('toastr:success', [
            'message' => 'Tweet Published!'
        ]);

        $this->body = '';
        $this->characters = 255;
    }
    
    public function render()
    {
        return view('livewire.timeline.store-tweet');
    }
}
