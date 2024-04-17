<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function feed(){
        $posts = Post::latest() -> get();
        $users = User::all();
        return view('feed', ['posts' => $posts, 'users' => $users]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'caption' => ['string', 'max:255']
        ]);

        $post = new Post();
        $post -> post_id = $request -> user() -> id;
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
