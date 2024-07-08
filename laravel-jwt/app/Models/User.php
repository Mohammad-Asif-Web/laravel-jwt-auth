<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $attributes = [
        'otp' => '0',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'positions' => 'array',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }

    // public function positions()
    // {
    //     return $this->belongsToMany(Position::class, 'position_id');
    // }

    // Relationship to the Collage
    public function collages()
    {
        return $this->hasMany(Collage::class);
    }

    // Relationship to the Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // how many followers have this user
    public function followers()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    // the user is following other user
    public function following()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class,'user_skill_pivot','user_id','skill_id');
    }

    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'receiver_id');
    }



}
