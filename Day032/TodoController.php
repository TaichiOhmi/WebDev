<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()// redirects user to index page
    {
        // $all_posts = $this->todo->latest()->get();
        // can only invoke "paginate" on a Query, not on a Collection. 
        // The latest and oldest methods allow you to easily order results by date. By default, the result will be ordered by the table's created_at column. 

        $all_posts = $this->todo->latest()->Paginate(10);

        return view('todos.index')->with('all_posts',$all_posts);
    }

    public function store(Request $request) // $requenst = new Request
    {
        $request->validate([
            'task' => 'required|min:1|max:50'
        ]);

        $this->todo->task = $request->task; // $_POST['task'] == $request->task
        $this->todo->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = $this->todo->findOrFail($id);

        return view('todos.edit')->with('task',$task);
    }
}
