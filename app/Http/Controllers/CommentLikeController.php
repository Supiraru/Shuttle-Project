<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
        public function __construct()
        {
            $this->middleware(['auth']);
        }
        
        public function store(Comment $comment, Request $request){
            if($comment->likedBy($request->user())){
                return response(null, 409); 
            }

            $comment->likes()->create([
                'user_id'=>$request->user()->id,
            ]);

            return back();
        }

        public function destroy(Comment $comment, Request $request){
            $request->user()->commentLikes()->where('comment_id', $comment->id)->delete();

            return back();
        }
}
