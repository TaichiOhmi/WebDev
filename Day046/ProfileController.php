<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    private $user;
    const LOCAL_STORAGE_FOLDER = 'public/images';

    public function __construct(User $user){
        $this->user = $user;
    }

    public function show($id){
        $user = $this->user->findOrFail($id);

        return view('users.profile.show')->with('user', $user);
    }

    public function edit(){
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.profile.edit')
            ->with('user', $user);
    }

    public function update(Request $request){
        #validation
        $request->validate([
            'name' => 'required|min:1|max:50',
            'email' => 'required',
            'introduction' => 'max:100',
            'avatar' => 'mimes:jpg,png,jpeg,gif|max:1048',
        ]);

        // return dump($request);

        $user = $this->user->findOrFail(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduction = $request->introduction;

        if($request->avatar){
            if($user->avatar != NULL){
                # is to delete the previous imaavatarge
                $this->deleteAvatar($user->avatar);
            }
            # upload the new image
            $user->avatar = $this->saveAvatar($request);
        }

        $user->save();

        return redirect()->route('profile.show', $user->id);
    }

    public function saveAvatar($request){
        $avatar = time().'.'.$request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER,$avatar);

        return $avatar;
    }

    public function deleteAvatar($avatar){
        $avatar_path = self::LOCAL_STORAGE_FOLDER.$avatar;

        // もし、ローカルディスクに存在していれば、
        if(Storage::disk('local')->exists($avatar_path)):
            // ローカルディスクから削除
            Storage::disk('local')->delete($avatar_path);
        endif;
    }


}
