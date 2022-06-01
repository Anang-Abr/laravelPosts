@extends('template.main')

@section('content')
<div class="mt-5 pt-2 row justify-content-center">
    @foreach ($posts as $post)
    <div class="my-2 p-3 border-bottom bg-secondary bg-opacity-10 rounded col-8 card">
        <h2>{{ $post->title }}</h2>
        <small>{{ $post->category->name }}</small>
        <p>{!! $post->excerpt !!}</p>
        <div>
        <a href="/blogs/{{ $post->id }}" class="stretched-link"></a>
        </div>
    </div>
    @endforeach
</div>
@endsection