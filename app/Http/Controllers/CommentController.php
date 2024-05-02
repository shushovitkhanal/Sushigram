<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'comment' => ['required', 'string', 'max:100'],
            'post_id' => ['required']
        ]);

        $comment = new Comment();
        $comment -> content = $request -> comment;
        $comment -> post_id = $request -> post_id;
        $comment -> user_id = $request -> user() -> id;
        $comment -> save();


        return redirect()->route('feed')->with('comment-success');
    }

    public function index($postId) {
        $comments = Comment::where('post_id',$postId)-> get();
        return view('feed', ['show-posts' => $comments]);
    }
        
}
