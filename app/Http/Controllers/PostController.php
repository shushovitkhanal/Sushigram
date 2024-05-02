<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function feed(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $users = User::all();
        $currentUser = 50;
        if(Auth::check()){
            $currentUser = Auth::user() -> id;
        }

        return view('feed', ['posts' => $posts, 'users' => $users, 'current_user'=>$currentUser]);
    }

    public function edit($post_id) {
        $post = Post::find($post_id);
        $currentUser = 50;
        if(Auth::check()){
            $currentUser = Auth::user() -> id;
        }
        return view('shared.edit-post', ['post' => $post, 'current_user'=>$currentUser]);
    }

    public function update(Request $request, $post_id) {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'caption' => ['required','string', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->route('feed')->with('post-fail', 'Invalid Post, Try Again');
        }

        $post = Post::find($post_id);
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post -> save();

        return redirect()->route('feed')->with('post-update', 'Post edited successfully');
    }

    public function destroy($post_id) {
        $post = Post::find($post_id);
        $post -> delete();

        return redirect()->route('feed')->with('post-delete', 'Post deleted successfully');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'caption' => ['string', 'max:255'],
            'image' => ['required']
        ]);
        
        $post = new Post();
        $post -> user_id = $request -> user() -> id;
        $post -> title = $request -> get('title');
        $post -> caption = $request -> get('caption');

        if ($request -> hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $imagePath = 'storage/images/' . $imageName;
            $post -> image = $imagePath;
        }
        
        $post->save();

        return redirect()->route('feed')->with('post-success', 'Post created successfully');
    }

}
