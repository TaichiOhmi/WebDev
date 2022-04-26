<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Usercontroller extends Controller
{
    //
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function showPhone($user_id)
    {
        $user_info = $this->user->find($user_id);
        $phone_info = $user_info->phone; // phoneは User class で作成したメソッド

        return "Name: $user_info->name.<br>Phone Number: $phone_info->phone";
    }

    public function showPosts($user_id)
    {
        $all_posts = $this->user->find($user_id)->posts;

        foreach($all_posts as $post){
            echo "<h2>$post->title</h2>";
            echo "<br>";
            echo "<p>$post->content</p>";
            echo "<hr>";
        }
    }
}
