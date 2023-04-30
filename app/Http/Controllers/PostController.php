<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\PostPolicy;


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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $post = new Post([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'message' => $request->input('message'),
        ]);

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'message' => 'required',
        ]);

        $post->update($validatedData);
        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully');
    }
}
