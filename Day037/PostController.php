<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;
    
    const LOCAL_STORAGE_FOLDER = 'public/images';

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_posts = $this->post->latest()->paginate(10);

        return view('posts.index')->with('all_posts',$all_posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|min:1|max:50',
            'body' => 'required|min:1|max:1000',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:1048' // mime - multipurpose internet mail extensions
        ]);

        $this->post->user_id = Auth::user()->id;
        $this->post->title = $request->title;
        $this->post->body = $request->body;
        $this->post->image = $this->saveImage($request);
        $this->post->save();

        return redirect()->route('index');
    }

    public function saveImage($request){
        // change the name of the file
        $image_name = time().' '.$request->image->extension(); // extension() は extensnion name

        // save the image inside storage/app/publicimages
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    public function showPost($post_id){
        $post = $this->post->findOrFail($post_id);
    
        return view('posts.show')->with('post',$post);
    }

    public function editPost($post_id){
        $post = $this->post->findOrFail($post_id);

        return view('posts.edit')->with('post',$post);
    }

    public function updatePost(Request $request, $post_id)
    { 
        $request->validate([
            'title' => 'required|min:1|max:50',
            'body' => 'required|min:1|max:1000',
            'image' => 'mimes:jpg,jpeg,png,gif|max:1048' // mime - multipurpose internet mail extensions
        ]);

        $post = $this->post->findOrFail($post_id);
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        if (isset($request->image)){
            $post->image = $this->saveImage($request);
        }
        $post->save();
        
        return redirect()->route('index');
    }

    public function destroyPost($post_id){
        $this->post->destroy($post_id);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
