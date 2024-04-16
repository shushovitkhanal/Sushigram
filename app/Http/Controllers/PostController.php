<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function feed(){
        $posts = Post::latest() -> get();
        return view('feed', ['posts' => $posts]);
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
        $post->save();

        return redirect('/feed')->with('success', 'Post created successfully!');
    }

}
