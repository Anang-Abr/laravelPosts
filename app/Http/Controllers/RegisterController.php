<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max: 255',
            'username' => 'required|max: 255|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        // $validatedData['slug'] = SlugService::createSlug(Post::class, 'slug', 'My First Post');

        // return $validatedData;

        User::create($validatedData);

        // $request->session()->flash('success', "Registration succeed"); // flash dapat juga dilakukan dengan cara seperti ini
        return redirect('login')->with('success', "Registration succeed");
    }
}
