<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create()// redirects user to index page
    {
        return view('items.createUser');
    }

    public function show()
    {
        $all_users = $this->user->latest()->paginate(10);

        return view('items.showUsers')->with('all_users',$all_users);
    }

    public function store(Request $request) // $requenst = new Request
    {
        $request->validate([
            'name' => 'required|min:1|max:50',
            'age' => 'required|min:1|max:50',
            'gender' => 'required|min:1|max:50',
            'address' => 'required|min:1|max:100',
            'phone_number' => 'required|min:1|max:50',
            'email' => 'required|min:1|max:50',
            'password' => 'required',
        ]);

        $this->user->name = $request->name;
        $this->user->age = $request->age;
        $this->user->gender = $request->gender;
        $this->user->address = $request->address;
        $this->user->phone_number = $request->phone_number;
        $this->user->email = $request->email;
        $this->user->password = $request->password;
        $this->user->save();

        return redirect()->route('users');
    }

    public function edit($id)
    {
        $user = $this->user->findOrFail($id);

        return view('items.editUser')->with('user',$user);
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'name' => 'required|min:1|max:50',
            'age' => 'required|min:1|max:50',
            'gender' => 'required|min:1|max:50',
            'address' => 'required|min:1|max:100',
            'phone_number' => 'required|min:1|max:50',
            'email' => 'required|min:1|max:50',
            'password' => 'required',
        ]);

        $user = $this->user->findOrFail($id);

        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('users');
    }

    public function destroy($id)
    {
        $this->user->destroy($id);

        return redirect()->back();
    }

}
