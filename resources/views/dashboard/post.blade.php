@extends('dashboard.template.main')

@section('content')
<div class="mt-5 pt-2 row justify-content-start">
    <div>
        <a href='{{ url('/dashboard/mypost') }}' class="btn btn-success">Go back</a>
        <a href="/dashboard/mypost/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather='edit'></span> Edit</a>
        <form action="/dashboard/mypost/{{ $post->slug }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn btn-danger border-0 hover" onclick="return confirm('Are you sure want to delete this post?')"><a data-feather='x-circle'></a> Delete</button>
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