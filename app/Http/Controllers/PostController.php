<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'redir']);
    }

    public function redir()
    {
        return redirect()->route('global');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('global', [
            'posts' => $posts
        ]);
    }
    
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'caption' => 'required'
        ]);

        $post = $request->user()->posts()->create($request->only('caption'));
        if($request->file('image')){
            if($request->file('image')->isValid()){
                $newImageName = time() . '-' . $request->user()->username . '.'. $request->image->extension();
                $request->image->move(public_path('images'), $newImageName);
                Photos::create([
                    'user_id'=>$request->user()->id,
                    'post_id'=>$post->id,
                    'slug'=>$newImageName
                ]);
            }
        }

        return back()->with('success', 'Create Post Success');
    }
    public function destroy(Post $post, Request $request)
    {
        if($request->user()->id == $post->user->id){
            $post->delete();
        }
        $previousUrl = url()->previous();
        if(substr($previousUrl, -8) == "comments"){
            return redirect()->route('global');
        }
        return back();
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('post-edit', [
            'post' => $post,
        ]);
    }

    public function update($id ,Request $request)
    {
        $this->validate($request,[
            'caption' => 'required'
        ]);

        $post = Post::where('id', $id)->first();    
        $post->caption = $request->caption; 
        $post->save();
        return redirect()->route('comments', $id);
    }
}
