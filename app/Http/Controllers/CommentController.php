<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function edit($comment_id) {
        $comment = Comment::find($comment_id);
        $currentUser = 50;
        if(Auth::check()){
            $currentUser = Auth::user() -> id;
        }
        return view('shared.edit-comment', ['comment' => $comment, 'current_user'=>$currentUser]);
    }

    public function update(Request $request, $comment_id) {
        $validator = Validator::make($request->all(), [
            'content' => ['required', 'string', 'max:100']
        ]);

        if ($validator->fails()) {
            return redirect()->route('feed')->with('comment-fail', 'Invalid Post, Try Again');
        }

        $comment = Comment::find($comment_id);
        $comment->content = $request->content;
        $comment -> save();

        return redirect()->route('feed')->with('comment-update', 'Comment edited successfully');
    }

    public function destroy($comment_id) {
        $comment = Comment::find($comment_id);
        $comment -> delete();

        return redirect()->route('feed')->with('comment-delete', 'Comment deleted successfully');
    }
        
}
