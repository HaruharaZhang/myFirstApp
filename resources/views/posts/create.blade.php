@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Post</h1>
    <!-- <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Upload Image</button>
    </form> 
        @if (session('image'))
        <img src="{{ asset('images/' . session('image')) }}" alt="Uploaded Image">
        @endif-->

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
        </div>
        <div class="form-group">
            <img id="preview" src="" alt="Preview Image" class="img-fluid" style="display: none; max-width: 500px;">
        </div>


        <div class="form-group">
            <label for="message">Content</label>
            <textarea class="form-control" id="message" name="message" rows="10" placeholder="Enter post content" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
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