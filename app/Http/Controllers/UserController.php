<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser($user_id) {
        $author = User::find($user_id);
        return $author;
    }
}
