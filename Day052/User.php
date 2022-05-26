<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post; // optional
use App\Models\Follow; // optional
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    const ADMIN_ROLE_ID = 1;
    const USER_ROLE_ID = 2;

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
        // 第二引数には参照先テーブルの外部キー
        return $this->hasMany(Follow::class, 'following_id'); // following_id can show who are following me.
    }

    // 自分が誰をフォローしているか
    public function following(){
        // 第二引数には参照先テーブルの外部キー
        return $this->hasMany(Follow::class, 'follower_id'); // follower_id can show many times i followed a user, thus shows who i am follow.
    }

    // Auth::user() から呼び出し、私は引数の$idのuserをフォローしているかの真偽。, Am I following you?
    public function isFollowing($id){
        return $this->following()->where('following_id', '=', $id)->exists();
    }

    // postやuserから呼び出して、自分がその人をフォローしているかの真偽　, Are you being followed by me?
    public function isFollowed(){
        return $this->followers()->where('follower_id', '=', Auth::user()->id)->exists();
    }

    public function hasPost(){
        foreach($this->following as $following){
            if($following->following->posts->count() > 0){
                return true;
            }
        }
        return false;
    }
}
