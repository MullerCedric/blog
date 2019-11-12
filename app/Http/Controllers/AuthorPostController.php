<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class AuthorPostController extends Controller
{
    public function index(User $user)
    {
        // $posts = Post::published()->where('author_id', $user->id)->orderByDesc('published_at')->paginate(5);
        $posts = $user->posts()->published()->orderByDesc('published_at')->paginate(5);
        return view('post.index', compact('user', 'posts'));
    }
}
