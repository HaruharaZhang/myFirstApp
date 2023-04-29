@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create New Post</h1>
        
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
            </div>

            <div class="form-group">
                <label for="desc">Summary</label>
                <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter post summary" required>
            </div>

            <div class="form-group">
                <label for="message">Content</label>
                <textarea class="form-control" id="message" name="message" rows="10" placeholder="Enter post content" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
