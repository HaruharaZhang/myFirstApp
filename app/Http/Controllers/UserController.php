<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user,Request $request)
    {
        // 设置每页显示 6 条数据，并添加自定义查询参数
        $posts = Post::where('user_id', $user->id)->paginate(6, ['*'], 'postPage');
        $comments = Common::where('user_id', $user->id)->paginate(6, ['*'], 'commentPage');

        // 同步查询参数
        $posts->appends(['commentPage' => $request->input('commentPage')]);
        $comments->appends(['postPage' => $request->input('postPage')]);

        return view('users/home', compact('user', 'posts', 'comments'));
        //return view('users.home', compact('user'));
    }
}

