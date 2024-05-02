<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser($user_id) {
        $author = User::find($user_id);
        return $author;
    }

    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $posts = $user -> posts() -> paginate(5);
        $comments = $user -> comments() -> paginate(5);
        
        return view('profile.show', ['user' => $user, 'posts' => $posts, 'comments' => $comments]);
    }

    public function profile()
    {
        $user_id = Auth::user() -> id;
        $user = User::findOrFail($user_id);
        $posts = $user -> posts() -> paginate(5);
        $comments = $user -> comments() -> paginate(5);
        
        return view('profile.show', ['posts' => $posts, 'user' => $user, 'comments' => $comments]);
    }
}
