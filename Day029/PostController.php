<?php

namespace App\Http\Controllers;

use App\Models\Post; // Post
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(){
        // create an instance of Post model
        $post_m = new Post; 

        $post_m->title = 'RealMadrid';
        $post_m->content = "Vamos!!";
        
        // Use eloquent's method
        $post_m->save();
    }

    public function storeCreate(){
        $post_m = new Post;

        $new_post = [
            'title' => 'How to stay productive',
            'content' => 'To be truly productive, you must first set your goals.'
        ];

        // mass asignment - Mass assignment is the process of sending an array of data to the model (to save a field or many fields) in a single process.
        $post_m->create($new_post);
    }

    public function index(){
        $post_m = new Post;
        $all_post = $post_m->all();

        foreach ($all_post as $post) {
            echo 'Title: '.$post->title;
            echo '<br>';
            echo 'Content: '.$post->content;
            echo '<br>';
            echo '<hr>';
        }
    }

    public function show($post_id){
        $post_m = new Post;

        $post = $post_m->findOrFail($post_id);

        echo 'Title: '.$post->title;
        echo '<br>';
        echo 'Content: '.$post->content;
    }

    public function update($post_id){
        $post_m = new Post;

        $post = $post_m->findOrFail($post_id);

        $post->title = 'New Title';
        $post->content = 'New Content';
        $post->save();
    }


    // public function index(){
    //     return 'Post Controller: index method';
    // }

    // public function viewPost($post_id){
    //     return "Post Controller: This is Post $post_id";
    // }

    // // public function viewUserPost($username, $post_id){
    // //     return "Post $post_id. This is a post of $username";
    // // }

    // public function show($name){
    //     $name = Str::upper($name); # $name = strtoupper($name); $name = mb_strtoupper($name);
    //     return "Hello $name!";
    // }

    // public function viewAllPosts(){
    //     $post_titles = [
    //         'Python vs Java',
    //         'The Cloud',
    //         'How to stay Productive',
    //         'Coding during a pandemic'
    //     ];
    //     return view('view-all')->with('post_titles', $post_titles);
    // }

    // public function viewUserPost($username, $post_id){
    //     return view('view-post')
    //     ->with('post_id', $post_id)
    //     ->with('username', $username);
    // }

}
