<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profiles()
    {
        return $this->hasOne( 'App\Profile' );
    }

    public function comments()
    {
        return $this->hasMany( 'App\Comment' );
    }

    public function posts()
    {
        return $this->hasMany( 'App\Post' );
    }

    public function followers()
    {
        return $this->hasMany( 'App\Follower' )->withTimestamps();
    }

    public function followings()
    {
        return $this->hasMany( 'App\Follower' )->withTimestamps();
    }

    public function likedPosts()
    {
        return $this->morphedByMany('App\Post', 'likeable')->whereDeletedAt(null);
    }

    public function likes(){
    
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimeStamps();
      }

}
