<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class AuthorPostController extends Controller
{
    public function index(User $user)
    {
        if ($user->id == auth()->id()) {
            $posts = Post::withoutGlobalScope('published')->where('author_id', $user->id)->orderByDesc('published_at')->paginate(5);
        } else {
            $posts = $user->posts()->orderByDesc('published_at')->paginate(5);
        }
        return view('post.index', compact('user', 'posts'));
    }
}
