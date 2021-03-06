@extends('template.main')
@section('content')
<div class="mt-5 pt-2 row justify-content-start">
    <div class="my-2 p-3 col-2 gap-2">
        <a class="btn btn-primary fluid" href="/blogs" role="button">back</a>
    </div>
    <div class="my-2 p-3 col-8">
       @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top rounded"  alt="...">
        {{-- yang disini tadi ^ --}}
        @else
        <img src="{{ url('img/'. $post->category->slug . '.jpg') }}" class="card-img-top rounded"  alt="...">
        @endif
        <h2>{{ $post->title }}</h2>
        <small>{{ $post->category->name }}</small>
        <p>Author: <a href= "{{ url('blogs?author=' .$post->user->slug) }}"> {{ $post->user->username }}</a></p>
        <p>category: <a href= "{{ url('blogs?category='.$post->category->slug) }}">{{ $post->category->name }}</a></p>
        <p>{!! $post->body !!}</p>
    </div>
</div>
@endsection