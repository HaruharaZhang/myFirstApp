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

    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        $comments = Common::where('user_id', $user->id)->get();

        return view('users/home', compact('user', 'posts', 'comments'));
    }
}
