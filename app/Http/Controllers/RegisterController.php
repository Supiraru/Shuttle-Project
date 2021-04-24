<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('register');
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password) 
        ]);

        $avatar = "https://www.gravatar.com/avatar/" . md5("farhandewanta11@gmail.com ");

        Profile::create([
            'name'=>$request->username,
            'user_id'=>$user->id,
            'avatar'=>$avatar
        ]);

        auth()->attempt($request->only('email', 'password')); 

        return redirect()->route('global')->with('success', 'Register Success');
    }
}
