@extends('template.main')
@section('content')
<div class="mt-5 pt-2 row justify-content-start">
    <div class="my-2 p-3 col-2 gap-2">
        <a class="btn btn-primary fluid" href="/blogs" role="button">back</a>
    </div>
    <div class="my-2 p-3 col-8">
        <h2>{{ $post->title }}</h2>
        <small>{{ $post->category->name }}</small>
        <p>Author: {{ $post->author->name }}</p>
        <p>slug : {{ $post->slug }}</p>
        <p>{!! $post->body !!}</p>
    </div>
</div>
@endsection