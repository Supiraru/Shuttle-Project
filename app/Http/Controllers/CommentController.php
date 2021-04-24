<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Post $post, Request $request){
        $comments = $post->comments()->get();
        return view('comment', [
            'post' => $post,
            'comments' => $comments,
        ]);
        
    }

    public function store(Post $post, Request $request){

        $this->validate($request, [
            'comment' => 'required'
        ]);

         $post->comments()->create([
             'user_id'=>$request->user()->id,
             'comment'=>$request->comment
         ]);

         return back();
    }
}
