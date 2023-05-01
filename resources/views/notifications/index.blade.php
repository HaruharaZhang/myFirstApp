@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Notifications</h1>
    <ul class="list-group">
        @foreach($notifications as $notification)
        <li class="list-group-item">
            @if(!$notification->is_read)
            <span class="text-danger">NEW</span> <strong>{{ $notification->content }}</strong>
            @else
            {{ $notification->content }}
            @endif
            <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="btn btn-sm btn-primary">Take a look</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
