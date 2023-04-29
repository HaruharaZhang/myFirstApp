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
                            <div class="post">
                                <h4>{{ $post->title }}</h4>
                                <p>{{ $post->content }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="user-comments">
                        <h3>Comments</h3>
                        @foreach ($comments as $comment)
                            <div class="comment">
                                <p>{{ $comment->content }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
