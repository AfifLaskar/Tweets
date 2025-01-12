<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{   
    public function scopeWithLikes(Builder $query)
    {
        return self::withCount([
            'likes as likes' => function ($query) {
                $query->where('liked', true);
            }, 
            'likes as dislikes' => function($query){
                $query->where('liked', false);
            }
        ]);
    }
    
    public function likes() // check all likes for certain user $user->likes;
    {
        return $this->hasMany(Like::class);    
    }

    public function like() // like tweet
    {   
        $this->likes()->updateOrCreate([
            'user_id' => auth()->id()
        ], [
            'liked' => true
        ]);
    }

    public function dislike() // dislike tweet
    {
        $this->likes()->updateOrCreate([
            'user_id' => auth()->id()
        ], [
            'liked' => false
        ]);
    }

    public function isLikedBy() // count of liked votes
    {
        return auth()->user()->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy() // count of disliked votes
    {
        return auth()->user()->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    } 

    public function isLikedByOwner() //check if user has liked vote or not, if true returns model if false null
    {
        return $this->likes
            ->where('user_id', auth()->id())
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->first();    
    }

    public function isDislikedByOwner() //check if user has disliked vote or not, if true returns model if false null
    {
        return $this->likes
            ->where('user_id', auth()->id())
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->first();   
    }   
}