<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MyLoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/users/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/zoo', function () {
    return view('zoo');
});

Route::get('/animals', [AnimalController::class, 'index']) -> name('animals.index');

Route::post('/animals', [AnimalController::class, 'store']) -> name('animals.store');

Route::get('/animals/create', [AnimalController::class, 'create']) -> name('animals.create');

Route::get('/animals/{id}', [AnimalController::class, 'show']) -> name('animals.show');
//这里id不能放在create的前面
//是因为laravel会去找id为create 的东西
//换句话说，id被当作一个参数传进去了


//Route::get('/animals/create', 'AnimalController@create') -> name('animals.create');

//Route::post('animals', 'AnimalController@store') -> name('animals.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Route::get('/users/login', [LoginController::class, 'showLoginForm'])->name('users.login');
Route::get('/users/login', [MyLoginController::class, 'showLoginForm'])->name('users.login');
Route::post('/users/login', [MyLoginController::class, 'login']);
Route::post('/users/logout', [MyLoginController::class, 'logout'])->name('users.logout');


Route::get('/users/register', [RegisteredUserController::class, 'create'])->name('register');

//Route::get('/users/home', 'HomeController@index')->name('home');
Route::get('/users/home', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
