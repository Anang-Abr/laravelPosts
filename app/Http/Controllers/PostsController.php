<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    
    public function index()
    {
        return view('home', [
        'title' => 'Home'
    ]);
    }

    public function posts()
    {
        return view('blogs', [
        'title' => 'Blogs',
        'posts' => Posts::with(['category', 'author'])->latest()->get()
    ]);
    }

    public function post($id)
    {
        return view('post', [
            'title' => 'Post',
            'post' => Posts::findOrFail($id)
        ]);
    }
}
