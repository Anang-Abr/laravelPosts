@extends('template.main')

@section('content')
<div class="row">
@if(session()->has('success'))
<div class="col-12">
  <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
  <strong>{{ session('success') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('loginError'))
<div class="col-12">
  <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
  <strong>{{ session('loginError') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>
<div class="col-12">
<main class="form-signin w-100 m-auto">
    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
  <form action="{{ url('/login') }}" method="post">
    @csrf
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    <div class="form-floating">
      <input type="email" class="form-control @error('name') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" autofocus required value='{{ old('name') }}'>
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name='password' id="password" placeholder="Password">
      <label for="password">Password</label>
    </div>
    @error('email')
      <div class="invalid-feedback">
        password atau email salah
      </div>
    @enderror
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
    <small>Not registered yet? <a href="{{ url('register') }}">Register now</a></small>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>
</div>
</div>
@endsection