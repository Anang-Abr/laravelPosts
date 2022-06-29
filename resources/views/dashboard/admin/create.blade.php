@extends('dashboard.template.main')

@section('content')
<form action="/dashboard/category" method="post" enctype="multipart/form-data">
    @csrf
    <h2>Create Category</h2>

{{-- //title --}}
<div class="my-3">
  <label for="name" class="form-label">Category Name</label>
  <input type="text" name='name' class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category's name" required autofocus value='{{ old('name') }}'>
  @error('name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

{{-- //slug --}}
<div class="mb-3">
  <label for="slug" class="form-label">Slug</label>
  <input type="text" name='slug' class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug" readonly value='{{ old('slug') }}'>
   @error('slug')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

{{-- //image --}}
{{-- <div class="mb-3">
  <label for="image" class="form-label @error('image') is-invalid @enderror">Post image</label>
  <div style="max-height: 350px; overflow:hidden;" class="mb-3">
    <img class="img-preview img-fluid" alt="">
  </div>
  <input class="form-control" name='image' type="file" id="image" onchange="previewImage()">
  @error('image')
  <div class="invalid-feedback">
    {{  $message }}
  </div>
  @enderror
</div> --}}

</div>
<button type="submit" class="btn btn-primary mb-4">Post</button>
</form>


<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    
    name.addEventListener('change', function(){
        fetch('/dashboard/category/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
        console.log(name.value);
    })

//    function previewImage(){
//       const imgPreview = document.querySelector('.img-preview');
//       const blob = URL.createObjectURL(image.files[0]);
    
//       imgPreview.src = blob;
//     }    
</script>
@endsection