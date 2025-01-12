<?php

namespace App\Models;

use App\Traits\Followable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'overview'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAvatarAttribute($value) // $user->avatar;
    {
        return $value ? asset('storage/images/' . $value) : asset('storage/images/default-avatar.jpg');
    }

    public function tweets() // $user->tweets();
    {
        return $this->hasMany(Tweet::class)->latest();    
    }

    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function timeline() // user + users followers tweets
    {
        $friendsId = $this->follows()->pluck('id'); 

        return Tweet::whereIn('user_id', $friendsId)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(30);    
    }
}
