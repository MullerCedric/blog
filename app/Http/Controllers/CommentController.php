<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentStoreRequest;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request, Post $post)
    {
        $comment = new Comment();
        $comment->content = request('content');
        $comment->author_id = auth()->id();

        $post->comments()->save($comment);
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
