<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request){
        $userId = [];
        if($request->user()){
            $following = $request->user()->following()->get();
            for( $i = 0; $i < $following->count(); $i++){
                $userId[] = $following[$i]->followers;
            }
        }
        $posts = Post::latest()->whereIn('user_id', $userId)->paginate(5);
        return view('home', compact('posts'));
    }
}
