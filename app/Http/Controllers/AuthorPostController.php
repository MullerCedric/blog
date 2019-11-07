<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class AuthorPostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->paginate(5);
        return view('landing', compact('user', 'posts'));
    }
}
