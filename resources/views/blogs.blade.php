@extends('template.main')

@section('content')
@if($posts->count())
<div class="my-5 row justify-content-center">
    <div class="col-12">
        @if(request('category'))
        <h1>{{ $posts[0]->category->name }}</h1>
        @elseif(request('author'))
        <h1>{{ $posts[0]->author->name }}</h1>
        @else
        <h1>{{ $header }}</h1>
        @endif
    </div>
</div>
<div class="row justify-content-start">
    <div class="col-6">
    <form class="d-flex " role="search" action='/blogs' >
          @if(request('category'))
          <input type="hidden" value={{ request('category') }} name="category">
          @endif
          @if(request('author'))
          <input type="hidden" value={{ request('author') }} name="author">
          @endif
          <input class="form-control me-2" type="search" placeholder="Search" autocomplete="off" name="search" value={{ request('search') }}>
          <button class="btn btn-outline-dark" type="submit" >Search</button>
        </form>
        </div>
</div>
<div class="mt-3 row justify-content-center">
    <div class="card col-12">
    <img src="{{ url('img/'. $posts[0]->category->slug . '.jpg') }}"  class="card-img-top" alt="...">
    <div class="card-body">
        <h2>{{ $posts[0]->title }}</h2>
        <small>in {{ $posts[0]->category->name }} by  {{ $posts[0]->author->name }}</small>
        <p>{!! $posts[0]->excerpt !!}</p>
        <a href="{{ url('blogs/' . $posts[0]->slug ) }}" class="btn-lg btn btn-primary float-end">Read More</a>
    </div>
    </div>
    @foreach ($posts->skip(1) as $post)
    <div class="my-3 col-md-4 ">
    <div class="card">
        <img src="{{ url('img/'. $post->category->slug . '.jpg') }}" class="card-img-top"  alt="...">
        <h5 class="card-title">{{ $post->title }}</h2>
        <small class="text-muted">in {{ $post->category->name }} by  {{ $post->author->name }}</small>
        <p>{!! $post->excerpt !!}</p>
        <div>
        <a href="{{ url('blogs/' . $post->slug ) }}" class="btn btn-primary float-end m-3">Read More</a>
        </div>
    </div>
    </div>
    @endforeach
</div>
{{ $posts->links() }}
@else
<div class="alert alert-danger mt-5">
Post not found.
</div>
<a href="{{  url('blogs') }}" class="btn btn-primary">Check Latest Post</a> 
@endif
@endsection