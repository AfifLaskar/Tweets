<?php

namespace App\Http\Livewire\Timeline;

use Livewire\Component;

class StoreTweet extends Component
{
    public $body;
    public $characters = 280;

    protected $rules = [
        'body' => 'required|string|max:280|min:5'
    ];

    public function charactersRemaining()
    {
        $this->characters = 280 - strlen($this->body);
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
        $this->characters = 280;
    }
    
    public function render()
    {
        return view('livewire.timeline.store-tweet');
    }
}
