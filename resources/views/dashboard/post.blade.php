@extends('dashboard.template.main')

@section('content')
<div class="mt-5 pt-2 row justify-content-start">
    <div>
        <a href='{{ url('/dashboard/mypost') }}' class="btn btn-success">Go back</a>
        <a class="btn btn-warning">Edit</a>
        <a class="btn btn-danger">Delete</a>
    </div>
    <div class="my-2 p-3 col-8">
        <img src="{{ url('img/'. $post->category->slug . '.jpg') }}" class="card-img-top rounded"  alt="...">
        <h2>{{ $post->title }}</h2>
        <small>{{ $post->category->name }}</small>
        <p>category: <a href= "{{ url('blogs?category='.$post->category->slug) }}">{{ $post->category->name }}</a></p>
        <p>{!! $post->body !!}</p>
    </div>
</div>
@endsection