@extends('dashboard.template.main')

@section('content')
<table class="table table-striped">
    <a href="/dashboard/mypost/create" class='btn btn-primary mt-4'>Add New Post</a>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      {{-- <th scope="col">Author</th> --}}
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
     <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->category->name }}</td>
      {{-- <td>{{ $post->author->name }}</td> --}}
      <td>
        <a href="/dashboard/mypost/{{ $post->slug }}" class="badge bg-primary"><span data-feather='eye'></span></a>
        <a href="/dashboard/mypost/{{ $post->id }}" class="badge bg-warning"><span data-feather='edit'></span></a>
        <a href="/dashboard/mypost/{{ $post->id }}" class="badge bg-danger"><span data-feather='x-circle'></span></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection