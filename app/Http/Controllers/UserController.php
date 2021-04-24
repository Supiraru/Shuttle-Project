<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(Request $request)
    {
        $profile = Profile::where('user_id', $request->user()->id)->first();
        $posts = $request->user()->posts()->latest()->get();
        return view('profile', [
            'profile' => $profile,
            'user' => $request->user(),
            'posts' => $posts
        ]);
    }

    public function userProfile(Request $request, $id)
    {
        if($id == $request->user()->id){
            $profile = Profile::where('user_id', $request->user()->id)->first();
            $posts = $request->user()->posts()->latest()->get();
            return view('profile', [
                'profile' => $profile,
                'user' => $request->user(),
                'posts' => $posts
            ]);
        }
        $user = User::find($id);
        $profile = Profile::where('user_id', $user->id)->first();
        $posts = $user->posts()->latest()->get();
        return view('userProfile', [
            'profile' => $profile,
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function edit(Request $request)
    {
        $profile = Profile::where('user_id', $request->user()->id)->first();
        return view('profile-edit', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'bio' => 'required'
            ]);
            

        $profile = Profile::where('user_id', $request->user()->id)->first();
        $profile->name = $request->name; 
        $profile->bio = $request->bio;
        $profile->save();
        return redirect()->route('profile');
    }

    public function follow(Request $request, $id){
        if($id == $request->user()->id){
            return back();
        }
        Follow::create([
            'following'=>$request->user()->id,
            'followers'=> $id
        ]);
        
        return back();
    }

    public function unfollow(Request $request, $id){
        DB::table('follows')->where('following', $request->user()->id)
                            ->where('followers', $id)
                            ->delete();

        return back();
    }

    public function account(){
        return view('account');
    }

    public function avatar(Request $request){
        if($request->file('image')){
            if($request->file('image')->isValid()){
                $newImageName = 'images/' . time() . '-' . $request->user()->username . '-profile-.'. $request->image->extension();
                $request->image->move(public_path('images'), $newImageName);
                $profile = Profile::where('user_id', $request->user()->id)->first();
                $profile->avatar = $newImageName;
                $profile->save();
            }
        }
        return redirect()->route('profile');
    }
}
