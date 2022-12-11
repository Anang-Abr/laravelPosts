<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\AdminCategories;



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
Route::get('/blogs/{post}', [PostsController::class, 'post']);
Route::get('/category', [PostsController::class, 'categories']);
Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
});

// ajax
Route::get('/ajax', [PostsController::class, 'ajax'])->middleware('auth');

// Route::get('/author/{author:slug}', [PostsController::class, 'author']); sudah tidak dipakai karena penampilan post bedasarkan author di handle dengan metode searching
// Route::get('/category/{category:slug}', [PostsController::class, 'category']);

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

Route::get('/dashboard/posts/checkSlug', [DashboardPostsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/mypost', DashboardPostsController::class)->middleware('auth'); 


Route::resource('/dashboard/category', AdminCategories::class)->except('show')->middleware('auth'); 
Route::get('/dashboard/category/checkSlug', [AdminCategories::class, 'checkSlug'])->middleware('auth');
