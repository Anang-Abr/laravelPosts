@extends('dashboard.template.main')

@section('content')
<div>
    <table class="table table-striped">
  @if(session()->has('success'))
  <div class="col-12">
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <a href="/dashboard/category/create" class='btn btn-primary mt-4'>Add New Category</a>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
     <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $category->name }}</td>
      <td>
        {{-- <a href="/dashboard/category/{{ $category->slug }}" class="badge bg-primary"><span data-feather='eye'></span></a> --}}
        <a href="/dashboard/category/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather='edit'></span></a>
        <form action="/dashboard/category/{{ $category->slug }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="badge bg-danger border-0 hover" onclick="return confirm('Are you sure want to delete this category?')"><a data-feather='x-circle'></a></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection