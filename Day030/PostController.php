<?php

namespace App\Http\Controllers;

use App\Models\Post; // Post
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $post_m;

    public function __construct(Post $post_m)
    {
        $this->post_m = $post_m;
    }

    
    public function store(){
        // create an instance of Post model
        // $post_m = new Post;

        $this->post_m->title = 'RealMadrid';
        $this->post_m->content = "Vamos!!";
        
        // Use eloquent's method
        $this->post_m->save();
    }

    public function storeCreate(){
        // $post_m = new Post;

        $new_post = [
            'title' => 'How to stay productive',
            'content' => 'To be truly productive, you must first set your goals.'
        ];

        // mass asignment - Mass assignment is the process of sending an array of data to the model (to save a field or many fields) in a single process.
        $this->post_m->create($new_post);
    }

    public function index(){
        // $post_m = new Post;
        $all_post = $this->post_m->all();

        foreach ($all_post as $post) {
            echo 'Title: '.$post->title;
            echo '<br>';
            echo 'Content: '.$post->content;
            echo '<br>';
            echo '<hr>';
        }
    }

    public function show($post_id){
        // $post_m = new Post;

        $post = $this->post_m->findOrFail($post_id);

        echo 'Title: '.$post->title;
        echo '<br>';
        echo 'Content: '.$post->content;
    }

    public function update($post_id){
        // $post_m = new Post;

        $post = $this->post_m->findOrFail($post_id);

        $post->title = 'New Title';
        $post->content = 'New Content';
        $post->save();
    }

    public function indexPaginate(){
        // $post_m = new Post;

        $all_posts = $this->post_m->Paginate(5);

        return view('paginate-index')->with('all_posts',$all_posts);
    }

    public function destroy($post_id){
        // $post_m = new Post;

        $this->post_m->destroy($post_id);

        // destroy(1,2,4,61);
        // destroy([15, 18,24]);
        // ids = [25,26,31];
        // destroy(ids);

        //$post_m->where('id', $post_id)->delete();
        //$post_m->where('title', $post_title)->delete();
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
