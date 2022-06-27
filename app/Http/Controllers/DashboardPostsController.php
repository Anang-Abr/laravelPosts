<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.myposts', [
            'title' => 'Dashboard',
            'posts' => Posts::where('author_id', '=', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', 
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit((strip_tags($validatedData['body'])), 200);

        Posts::create($validatedData);
        return redirect('/dashboard/mypost')->with('success', "New post has been added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $mypost)
    {   
        return view('dashboard.post', [
            'post' => $mypost
        ]);
        // return Posts::where('id', '=', $posts)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $mypost)
    {   
        // return $mypost;
        return view('dashboard.edit', [
            'categories' => Category::all(),
            'post' => $mypost
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $mypost)
    {   
        // return $request;
        if($request['slug'] == $mypost->slug){
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'category_id' => 'required',
                'body' => 'required'
            ]);
        }
        else{
             $validatedData = $request->validate([
                'title' => 'required|max:255',
                'category_id' => 'required',
                'slug' => 'required:unique:posts',
                'body' => 'required'
            ]);
        }

        // $validatedData = $checkData->validate([

        // ]);

        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit((strip_tags($validatedData['body'])), 200);
        $validatedData['slug'] = $request['slug'];
        // return $validatedData;
        Posts::where('id', $mypost->id)->update($validatedData);
        return redirect('/dashboard/mypost')->with('success', "Post has been edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $mypost)
    {
        Posts::destroy($mypost->id);
        return redirect('/dashboard/mypost')->with('success', "Post has been deleted");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Posts::class, 'slug', $request->title);
        // dd($slug);
        return response()->json(['slug' => $slug]);
    }
}
