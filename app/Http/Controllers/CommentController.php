<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        //dd($request, $post);
        $request->validate([
            'content' => 'required|max:700',
        ]);

        $comment = new Common;
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->CommonMsg = $request->content;
        $comment->save();
        
        if ($post->user_id != Auth::id()) {
            $notification = new Notification([
                'user_id' => $post->user_id,
                'content' => 'Your post has been commented by ' . Auth::user()->name,
                'is_read' => false,
                'url' => $comment->post_id,
            ]);
            $notification->save();
        }

        return response()->json(['success' => true, 'common' => $comment]);
    }
    public function update(Request $request, Common $comment)
    {
        $this->authorize('update-comment', $comment);

        $request->validate([
            'content' => 'required'
        ]);

        $comment->update([
            'CommonMsg' => $request->input('content')
        ]);

        return response()->json(['status' => 'success']);
    }

    public function destroy(Common $comment)
    {
        $this->authorize('delete-comment', $comment);

        $comment->delete();

        return response()->json(['status' => 'success']);
    }
}
