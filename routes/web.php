<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostsController;


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
Route::get('/author/{author:slug}', [PostsController::class, 'author']);
Route::get('/category', [PostsController::class, 'categories']);
Route::get('/category/{category:slug}', [PostsController::class, 'category']);
Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
});
