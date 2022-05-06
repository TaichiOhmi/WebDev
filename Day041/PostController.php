<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    const LOCAL_STORAGE_FOLDER = 'public/images';
    private $post;
    private $category;

    public function __construct(Post $post,Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    public function create(){
        $all_categories = $this->category->all();

        return view('users.posts.create')->with('all_categories', $all_categories);
    }

    public function store(Request $request){
        #validation
        // $request->validate([
        //     'category' => 'required|array|between:1,3',
        //     'description' => 'required|min:1|max:1000',
        //     'image' => 'required|mime:jpg,png,jpeg,gif|max:1048',
        // ]);

        $this->post->user_id = Auth::user()->id;
        $this->post->image = $this->saveImage($request);
        $this->post->description = $request->description;

        $this->post->save();

        foreach($request->category as $category_id){
            $category_post[] = ['category_id' => $category_id];
        }// result: category_post = ['category_id' => '1', 'category_id' => '2', 'category_id' => '3'];

        // Post Model に作成した categoryPost() から CategoryPost Model に繋げて、createMany() で複数の関連モデルを category_post_table に作成。
        $this->post->categoryPost()->createMany($category_post);

        return redirect()->route('index');
    }

    public function saveImage($request){
        $image_name = time().'.'.$request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);

        return $image_name;
    }

    public function show($id){
        $post = $this->post->find($id);
        return view('users.posts.show')->with('post', $post);
    }
}
