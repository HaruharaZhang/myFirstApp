<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
//use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Common;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        //$posts = Post::where('user_id', $user->id)->get();
        // 设置每页显示 6 条数据
        //$posts = Post::where('user_id', $user->id)->paginate(6);
        //$comments = Common::where('user_id', $user->id)->get();
        // 每页显示6条评论
        //$comments = Common::where('user_id', $user->id)->paginate(6);
        // 设置每页显示 6 条数据，并添加自定义查询参数
        $posts = Post::where('user_id', $user->id)->paginate(6, ['*'], 'postPage');
        $comments = Common::where('user_id', $user->id)->paginate(6, ['*'], 'commentPage');

        // 同步查询参数
        $posts->appends(['commentPage' => $request->input('commentPage')]);
        $comments->appends(['postPage' => $request->input('postPage')]);

        return view('users/home', compact('user', 'posts', 'comments'));
    }
}
