<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
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

    public function store(PostStoreRequest $request)
    {
        $post_date = request('published_at_date') ?? date('Y-m-d');
        $post_time = request('published_at_time') ?? (request('published_at_date') ? '00:00' : date('H:i'));
        $post = new Post();
        $post->slug = Str::slug(request('title'), '-');
        $post->title = request('title');
        $post->published_at = $post_date . ' ' . $post_time . ':00';
        $post->content = request('content');
        auth()->user()->posts()->save($post);

        return redirect('/');
    }

    public function show(Post $post)
    {
        $post->load('comments');
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(PostStoreRequest $request, Post $post)
    {
        $post_date = request('published_at_date') ?? date('Y-m-d');
        $post_time = request('published_at_time') ?? (request('published_at_date') ? '00:00' : date('H:i'));
        $post->title = request('title');
        $post->slug = Str::slug(request('title'), '-');
        $post->published_at = $post_date . ' ' . $post_time . ':00';
        $post->content = request('content');
        $post->save();
        return redirect('/posts/' . $post->slug);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
