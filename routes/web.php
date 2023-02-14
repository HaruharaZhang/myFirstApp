<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//这个是默认的Route
Route::get('/', function () {
    return view('welcome');
});

//输入 http://127.0.0.1/blog 跳转到指定的页面
Route::get('/blog', function () {
    return "This is the /blog pages";
});

//重定向，当访问http://127.0.0.1/here 的时候就会自动重定向到 http://127.0.0.1/there
Route::redirect('/here','/there');

//输入 http://127.0.0.1/home/{name} 前往指定用户的页面
//比如 http://127.0.0.1/home/jackey
Route::get('/home/{name}', function ($name) {
    return "This is $name's home pages";
});

//当用户名为空的时候，返回特定值
Route::get('/user/{name?}', function ($name = null) {
    return 'no user found! cause the user name is null';
});

//使用默认用户名
Route::get('/user/default/{name?}', function ($name = 'John') {
    return $name;
});