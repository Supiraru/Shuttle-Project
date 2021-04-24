<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function following(Request $request){
        $userId = [];
        if($request->user()){
            $following = $request->user()->following()->get();
            for( $i = 0; $i < $following->count(); $i++){
                $userId[] = $following[$i]->followers;
            }
        }
        $users = User::latest()->whereIn('id', $userId)->paginate(20);
        return view('following', compact('users'));
        
    }
    
    public function followers(Request $request){
        $userId = [];
        if($request->user()){
            $followers = $request->user()->followers()->get();
            for( $i = 0; $i < $followers->count(); $i++){
                $userId[] = $followers[$i]->following;
            }
        }
        $users = User::latest()->whereIn('id', $userId)->paginate(20);
        return view('followers', compact('users'));
    }

    public function userFollowing(Request $request, $id){
        $userId = [];
        $user = User::find($id);
        $following = $user->following()->get();
        for( $i = 0; $i < $following->count(); $i++){
            $userId[] = $following[$i]->followers;
        }
        $users = User::latest()->whereIn('id', $userId)->paginate(20);
        return view('userFollowing', compact('users', 'user'));
        
    }

    public function userFollowers(Request $request, $id){
        $userId = [];
        $user = User::find($id);
        $followers = $user->followers()->get();
        for( $i = 0; $i < $followers->count(); $i++){
            $userId[] = $followers[$i]->following;
        }
        $users = User::latest()->whereIn('id', $userId)->paginate(20);
        return view('userFollowers', compact('users', 'user'));
        
    }
    
}
