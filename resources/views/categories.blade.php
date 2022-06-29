@extends('template.main')

@section('content')
<div class="mt-3 row justify-content-between">
@foreach ($categories as $category)
<div class="my-2 p-3 border-bottom bg-secondary bg-opacity-10 rounded col-3 card mx-1">
        <img src="{{ url('img/'. $category->slug . '.jpg') }}" class="card-img-top"  alt="...">
        <h2>{{ $category->name }}</h2>
        <div>
        <a href="{{ url('blogs?category=' . $category->slug) }}" class="stretched-link"></a>
        </div>
</div>
@endforeach
</div>
@endsection