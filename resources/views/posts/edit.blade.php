@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
        </div>
        <div class="form-group">
            <img id="preview" src="{{ $post->image_url }}" alt="Preview Image" class="img-fluid" style="max-width: 500px;">
        </div>

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

@push('scripts')
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
@endpush