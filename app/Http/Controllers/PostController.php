<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $post = new Post();
        $post->slug = Str::slug(request('title'), '-');
        $post->title = request('title');
        $post->published_at = request('published_at_date') . ' ' . request('published_at_time') . ':00';
        $post->content = request('content');
        auth()->user()->posts()->save($post);

        return redirect('/');
    }

    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $post->title = request('title');
        $post->published_at = request('published_at_date') . ' ' . request('published_at_time') . ':00';
        $post->content = request('content');
        $post->save();
        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
