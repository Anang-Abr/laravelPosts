<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;



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

Route::get('/home', [PostsController::class, 'index']);
Route::get('/', [PostsController::class, 'index']);
Route::get('/blogs', [PostsController::class, 'posts']);
Route::get('/blogs/{post:slug}', [PostsController::class, 'post']);
// Route::get('/author/{author:slug}', [PostsController::class, 'author']); sudah tidak dipakai karena penampilan post bedasarkan author di handle dengan metode searching
Route::get('/category', [PostsController::class, 'categories']);
// Route::get('/category/{category:slug}', [PostsController::class, 'category']);
Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
});
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
            'title' => 'Dashboard'
        ]);
})->middleware('auth');

Route::resource('/dashboard/mypost', DashboardPostController::class)->middleware('auth'); 
