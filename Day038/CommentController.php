<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    //
    public function storeComment(Request $request, $post_id)
    {
        //
        $request->validate([
            'comment' => 'required|min:1|max:100',
        ]);

        $this->comment->user_id = Auth::user()->id;
        $this->comment->post_id = $post_id;
        $this->comment->comment = $request->comment;
        $this->comment->save();

        return redirect()->back();
    }

    public function destroyComment($comment_id){
        $this->comment->destroy($comment_id);

        return redirect()->back();
    }
}
