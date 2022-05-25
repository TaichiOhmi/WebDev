<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        $all_user = $this->user->withTrashed()->latest()->paginate(10);

        return view('admin.users.index')->with('all_user', $all_user);
    }

    public function deactivate($id){
        // $this->user->findOrFail($id)->delete();
        $this->user->destroy($id);
        return redirect()->back();
    }

    public function activate($id){
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }
}
