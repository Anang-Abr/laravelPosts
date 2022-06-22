<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Author;
use App\Models\Category;

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
            'header' => 'Latest Posts',
            'title' => 'Blogs',
            'posts' => Posts::latest()->filter(request(['search', 'category', 'author']))->paginate(7)//paginate digunakan apabila kita ingin menggunakan fitur pagination
        ]);
    }

    public function post(Posts $post)
    {
        return view('post', [
            'title' => 'Post',
            'post' => $post
        ]);
    }

    public function author(Author $author)
    {
        return view('blogs', [
            'header' => 'Posts By: '.$author->name,
            'title' => 'Author',
            'posts' => $author->posts->load(['category', 'author'])
        ]);
    }

    public function categories()
    {
        return view('categories', [
            'title' => 'Category',
            'categories' => Category::latest()->get()
        ]);
    }
    public function category(Category $category)
    {
        return view('blogs', [
            'header' => 'Posts In: '.$category->name,
            'title' => 'Author',
            'posts' => $category->posts->load(['category', 'author'])
        ]);
    }
    
}
