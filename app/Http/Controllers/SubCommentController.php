<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;


class SubCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index($id, Request $request){
        $comment = Comment::find($id);
        $subComments = $comment->subComments()->get();
        
        return view('subComment', [
            'comment' => $comment,
            'subComments' => $subComments,
        ]);
        
    }

    public function store($id, Request $request){

        $comment = Comment::find($id);
        $this->validate($request, [
            'sub_comment' => 'required'
        ]);

         $comment->subComments()->create([
             'user_id'=>$request->user()->id,
             'sub_comment'=>$request->sub_comment
         ]);

         return back();
    }
}
