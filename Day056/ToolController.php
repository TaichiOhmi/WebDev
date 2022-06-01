<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    private $tool;

    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
    }

    public function create(){
        return view('users.tackles.create');
    }

    public function store(Request $request){
        #validation
        $request->validate([
            'lat' => 'required',
            'lng' => 'required',
            'name' => 'required',
            'description' => 'required|min:1|max:1000',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:1048',
        ]);

        $this->spot->spot = new Point($request->lat, $request->lng);
        $this->spot->name = $request->name;
        $this->spot->save();


        $this->log->spot_id = $this->spot->id;
        $this->log->user_id = Auth::user()->id;
        $this->log->image = $this->saveImage($request);
        $this->log->description = $request->description;
        $this->log->save();


        return redirect()->route('index');
    }
}
