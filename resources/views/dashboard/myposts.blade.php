@extends('dashboard.template.main')

@section('content')
<table class="table table-striped">
  @if(session()->has('success'))
  <div class="col-12">
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
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
        <a href="/dashboard/mypost/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather='edit'></span></a>
        <form action="/dashboard/mypost/{{ $post->slug }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="badge bg-danger border-0 hover" onclick="return confirm('Are you sure want to delete this post?')"><a data-feather='x-circle'></a></button>
        </form>
        {{-- <form action="" class="d-inline"> --}}
          {{-- <button type="button" class="badge bg-info border-0 ajax-btn" name="post" data-id="{{ $post->id }} " id="ajax-btn">ajax</button> --}}
          {{-- <a href="#" class="badge bg-info border-0 ajax-btn" name="post" data-id="{{ $post->id }} " id="ajax-btn">ajax</a> --}}
          <button type="button" class="badge bg-primary border-0 ajax-btn" data-bs-toggle="modal" name="post" data-id="{{ $post->id }}" data-bs-target="#exampleModal">
            Show
          </button>
        {{-- </form> --}}
      </td>
    </tr>
    @endforeach
  </tbody>
  {{-- modal --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  // $('#test-ajax').html = 'aduh';
  $('.ajax-btn').on('click', function(){
    console.log('test')
    const id = $(this).data('id');
    fetch('/ajax?id=' + id)
    .then(response => response.json())
    .then(function(data){
      $('.modal-body').html(data.title)
      console.log(data)
    })
    // console.log(id);

    // $.ajaxSetup({
    // headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $.ajax({
    //   url: "http://127.0.0.1:8000/ajax",
    //   data: {id: id},
    //   method: 'post',
    //   dataType: 'json',
    //   success: function(data){
    //     $('#test-ajax').html = "data";
    //   },
    //   error:function(xhr,err){
    //     alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
    //     alert("responseText: "+xhr.responseText);
    // }
    // })
  })
</script>
@endsection