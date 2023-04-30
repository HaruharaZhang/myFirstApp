@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" class="form-control" rows="3">{{ $post->desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="message">Content</label>
            <textarea name="message" id="message" class="form-control" rows="10">{{ $post->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
    </form>
</div>
@endsection
