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
        return view('todos.index');
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
}
