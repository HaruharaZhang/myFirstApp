<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('common.user');
        return view('posts.show', compact('post'));
    }
}
