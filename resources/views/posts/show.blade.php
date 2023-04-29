@extends('layouts.app')

@section('content')
<div class="container">
    <div class="post-container">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at->format('Y-m-d') }}</p>
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
            <li class="media my-4">
                <img class="mr-3 rounded-circle" src="{{ asset($comment->user->avatar) }}" alt="User Avatar" width="50" height="50">
                <div class="media-body">
                    <h5 class="mt-0 mb-1">{{ $comment->user->name }}</h5>
                    <p>{{ $comment->CommonMsg }}</p>
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
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // 处理表单的提交
    $('#comment-form').submit(function (event) {
      event.preventDefault();

      $.ajax({
        // url: $(this).attr('action'),
        url: "{{ route('comments.store', $post) }}",
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {
          // 在评论列表中添加新的评论
          var comment = response.common;
          var html = '<li class="media my-4"><img class="mr-3 rounded-circle" src="{{ asset(Auth::user()->avatar) }}" alt="User Avatar" width="50" height="50"><div class="media-body"><h5 class="mt-0 mb-1">' + '{{ Auth::user()->name }}' + '</h5><p>' + comment.CommonMsg + '</p><p>' + comment.created_at + '</p></div></li>';
          $('ul.list-unstyled').append(html);

          // 清空表单内容
          $('#content').val('');
        },
        error: function (xhr, status, error) {
          alert('发表评论失败，请稍后重试');
        }
      });
    });
  });
</script>
@endpush
