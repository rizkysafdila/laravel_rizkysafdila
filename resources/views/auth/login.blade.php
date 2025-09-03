@extends('layouts.auth')

@section('title', 'Login')

@section('content')
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
        name="username" value="{{ old('username') }}" required autofocus>
      @error('username')
        <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input id="password" type="password"
        class="form-control @error('password') is-invalid @enderror" name="password" required>
      @error('password')
        <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>
@endsection
