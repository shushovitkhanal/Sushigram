<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId) {
        $request->validate([
            'content' => ['required', 'string', 'max:100'],
        ]);

        $comment = new Comment();
        $comment -> content = $request -> content;
        $comment -> post_reference = $postId;
        $comment -> author = $request -> user;
        $comment -> save();


        return redirect()->route('feed')->with('comment-success');
    }
        
}
