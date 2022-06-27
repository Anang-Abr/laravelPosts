@extends('template.main')

@section('content')
<main class="form-register w-100 m-auto">
    <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
  <form action="{{  url('/register') }}" method="post">
    @csrf
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    <div class="form-floating">
      <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required value='{{ old('name') }}'>
      <label for="name">Name</label>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Usename" required value='{{ old('username') }}'>
      <label for="username">Username</label>
       @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required value='{{ old('email') }}'>
      <label for="email">Email address</label>
       @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name='password' id="password" placeholder="Password" required>
      <label for="password">Password</label>
       @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
    <small>Already have an account? <a href="{{ url('login') }}">Login now</a></small>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>
@endsection