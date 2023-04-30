@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Home</div>

                <div class="panel-body">
                    <div class="user-info">
                        <img src="{{ asset($user->avatar) }}" alt="User Avatar" width="100" height="100">
                        <p>Name: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                    </div>

                    <div class="user-posts">
                        <h3>Posts</h3>
                        @foreach ($posts as $post)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->desc }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View Post</a>
                            </div>
                        </div>
                        @endforeach

                        <!-- 添加翻页按钮 -->
                        <div class="d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>

                    <div class="user-comments">
                        <h3>Comments</h3>
                        @foreach ($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->post->title }}</h5> <!-- 通过 comment 的 post_id 获取 Post 的 title -->
                                <p class="card-text">{{ $comment->CommonMsg }}</p>
                                <p class="card-text">
                                    <small class="text-muted">Posted on {{ $comment->created_at->format('Y-m-d H:i:s') }}</small> <!-- 发布评论的时间 -->
                                </p>
                                <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-primary">View Post</a> <!-- 点击查看 Post 详情 -->
                            </div>
                        </div>
                        @endforeach

                        <!-- 渲染分页链接 -->
                        <div class="d-flex justify-content-center">
                            {{ $comments->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection