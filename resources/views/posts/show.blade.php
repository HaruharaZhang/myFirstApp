@extends('layouts.app')

@section('content')
<div class="container">
    <div class="post-container">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">
            Posted by
            <a href="{{ route('users.show', $post->user->id) }}">
                <img src="{{ asset($post->user->avatar) }}" alt="User Avatar" width="50" height="50" class="mr-3 rounded-circle">
            </a>
            {{ $post->user->name }} on {{ $post->created_at->format('Y-m-d') }}
        </p>

        @can('update-post', $post)
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit Post</a>
        @endcan
        <p>{{ $post->excerpt }}</p>
        <div class="post-content">
            <p style="color: gray; font-size: 16px;">{{ $post->desc }}</p>
            <p>{{ $post->message }}</p>
        </div>

        <div class="likes mt-3">
            <button class="btn btn-primary">Like</button> <span id="likes-count">{{ $post->likes_count }}</span> likes
        </div>
    </div>

    <div class="comments mt-5">
        <h3>Comments</h3>
        <ul class="list-unstyled">
            @foreach($post->common as $comment)
            <li class="media my-4" data-comment-id="{{ $comment->id }}">
                <!-- <img class="mr-3 rounded-circle" src="{{ asset($comment->user->avatar) }}" alt="User Avatar" width="50" height="50"> -->
                <a href="{{ route('users.show', $comment->user->id) }}">
                    <img class="mr-3 rounded-circle" src="{{ asset($comment->user->avatar) }}" alt="User Avatar" width="50" height="50">
                </a>

                <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $comment->user->name }}</h5>
                    @can('update-comment', $comment)
                    <button class="btn btn-sm btn-warning edit-comment-btn">Edit</button>
                    @endcan

                    <p class="comment-content">{{ $comment->CommonMsg }}</p>
                    <div class="edit-comment" style="display: none;">
                        <textarea class="form-control comment-edit-textarea">{{ $comment->CommonMsg }}</textarea>
                        <button class="btn btn-sm btn-primary save-comment-btn">Save</button>
                        <button class="btn btn-sm btn-danger delete-comment-btn">Delete</button>
                    </div>

                    <p>{{ $comment->created_at }}</p>
                </div>
            </li>
            @endforeach
        </ul>


        @auth
        <div class="add-comment mt-4">
            <h4>Add a comment</h4>
            <!-- <form id="comment-form" method="POST" action="{{ route('comments.store', ['post' => $post->id]) }}"> -->
            <form id="comment-form" method="POST" action="{{ route('comments.store', $post) }}">
                @csrf
                <div class="form-group">
                    <textarea id="content" name="content" rows="3" class="form-control" placeholder="Submit Comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>

        </div>
        @else
        <p class="text-muted">Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
        @endauth
    </div>
</div>
@endsection

@push('scripts')
<span id="user-can-update-comment" data-value="{{ Gate::allows('update-comment', $post) ? 'true' : 'false' }}" style="display:none;"></span>
<script>
    function addCommentToDOM(comment, userAvatar, userName) {
        var formattedDate = formatDateTime(comment.created_at);
        var userCanUpdateComment = $('#user-can-update-comment').data('value') === 'true';
        var editButtonHtml = userCanUpdateComment ? '<button class="btn btn-sm btn-warning edit-comment-btn">Edit</button>' : '';

        var html = '<li class="media my-4" style="display: none;" data-comment-id="' + comment.id + '"><img class="mr-3 rounded-circle" src="' + userAvatar + '" alt="User Avatar" width="50" height="50"><div class="media-body"><h5 class="mt-0 mb-1">' + userName + '</h5>' + editButtonHtml + '<p class="comment-content">' + comment.CommonMsg + '</p><div class="edit-comment" style="display: none;"><textarea class="form-control comment-edit-textarea">' + comment.CommonMsg + '</textarea><button class="btn btn-sm btn-primary save-comment-btn">Save</button><button class="btn btn-sm btn-danger delete-comment-btn">Delete</button></div><p>' + formattedDate + '</p></div></li>';

        var newComment = $(html);
        $('ul.list-unstyled').append(newComment);
        newComment.slideDown(500).fadeIn(500);
    }
    $(document).ready(function() {
        $('body').on('click', '.edit-comment-btn', function() {
            var commentContainer = $(this).closest('.media-body');
            commentContainer.find('.comment-content').hide();
            commentContainer.find('.edit-comment').show();
        });

        // Save comment button click event
        $('.save-comment-btn').click(function() {
            var commentContainer = $(this).closest('.media-body');
            var newContent = commentContainer.find('.comment-edit-textarea').val();
            var commentId = $(this).closest('.media').data('comment-id');

            //Send an AJAX request to update the comment in the database
            $.ajax({
                url: "{{ url('comments') }}/" + commentId,
                type: 'PUT',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'content': newContent
                },
                success: function(response) {
                    commentContainer.find('.comment-content').text(newContent);
                    commentContainer.find('.comment-content').show();
                    commentContainer.find('.edit-comment').hide();
                },
                error: function(xhr, status, error) {
                    alert('Update comment failed. Please try again.');
                }
            });
        });

        // Delete comment button click event
        $('.delete-comment-btn').click(function() {
            if (confirm('Are you sure you want to delete this comment?')) {
                var commentContainer = $(this).closest('.media-body');
                var commentId = $(this).closest('.media').data('comment-id');

                //Send an AJAX request to delete the comment from the database
                $.ajax({
                    url: "{{ url('comments') }}/" + commentId,
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        commentContainer.closest('.media').remove();
                    },
                    error: function(xhr, status, error) {
                        alert('Delete comment failed. Please try again.');
                    }
                });
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        // 处理表单的提交
        $('#comment-form').submit(function(event) {
            event.preventDefault();

            $.ajax({
                // url: $(this).attr('action'),
                url: "{{ route('comments.store', $post) }}",
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var comment = response.common;
                    addCommentToDOM(comment, "{{ asset(Auth::user()->avatar) }}", "{{ Auth::user()->name }}");

                    // 清空表单内容
                    $('#content').val('');
                },
                error: function(xhr, status, error) {
                    alert('发表评论失败，请稍后重试');
                }
            });
        });
    });

    // $('body').on('click', '.edit-comment-btn', function() {
    //         var commentContainer = $(this).closest('.media-body');
    //         commentContainer.find('.comment-content').hide();
    //         commentContainer.find('.edit-comment').show();
    //     });
    $('.comments').on('click', '.edit-comment-btn', function() {
        var commentContainer = $(this).closest('.media-body');
        commentContainer.find('.comment-content').hide();
        commentContainer.find('.edit-comment').show();
    });


    function formatDateTime(dateTimeStr) {
        var date = new Date(dateTimeStr);
        var year = date.getFullYear();
        var month = ("0" + (date.getMonth() + 1)).slice(-2);
        var day = ("0" + date.getDate()).slice(-2);
        var hours = ("0" + date.getHours()).slice(-2);
        var minutes = ("0" + date.getMinutes()).slice(-2);
        var seconds = ("0" + date.getSeconds()).slice(-2);

        return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    }
</script>
@endpush