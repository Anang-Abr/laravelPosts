@extends('dashboard.template.main')

@section('content')
<form action="/dashboard/mypost" method="post" enctype="multipart/form-data">
    @csrf
    <h2>Create Post</h2>

{{-- //title --}}
<div class="my-3">
  <label for="title" class="form-label">Post Title</label>
  <input type="text" name='title' class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Post's Title" required autofocus value='{{ old('title') }}'>
  @error('title')
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

{{-- //category_id --}}
<div class="my-3">
  <label for="category" class="form-label">Slug</label>
  <select name="category_id" id="" class="form-select mb-3">
    @foreach($categories as $category)
      @if(old('category_id') == $category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
      @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endif
    @endforeach
  </select>
   @error('category_id')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

{{-- //image --}}
<div class="mb-3">
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
</div>

{{-- // body --}}
<div class="my-3">
<label for="body" class="form-label">Body</label>
<input id="body" type="hidden" name="body" class='@error('body') is-invalid @enderror'>
<trix-editor input="body"></trix-editor>
 @error('body')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<button type="submit" class="btn btn-primary mb-4">Post</button>
</form>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault()
    })

   function previewImage(){
      const imgPreview = document.querySelector('.img-preview');
      const blob = URL.createObjectURL(image.files[0]);
    
      imgPreview.src = blob;
    }    
</script>
@endsection