<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post; // optional
use App\Models\Follow; // optional
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    // 誰が自分をフォローしているか
    public function followers(){
        return $this->hasMany(Follow::class, 'following_id'); // following_id can show who are following me.
    }

    // 自分が誰をフォローしているか
    public function following(){
        return $this->hasMany(Follow::class, 'follower_id'); // follower_id can show many times i followed a user, thus shows who i am follow.
    }

    public function isFollowing($id){
        return $this->following()->where('following_id', '=', $id)->exists() | Auth::user()->id == $id;
    }
}
