@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Edit Rumah Sakit</h2>

    <form action="{{ route('rumahsakit.update', $rumahsakit->id) }}" method="POST">
      @csrf
      @method('PUT')

      {{-- Nama Rumah Sakit --}}
      <div class="mb-3">
        <input type="text" name="nama_rumah_sakit" placeholder="Nama"
          value="{{ old('nama_rumah_sakit', $rumahsakit->nama_rumah_sakit) }}"
          class="form-control @error('nama_rumah_sakit') is-invalid @enderror">
        @error('nama_rumah_sakit')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- Alamat --}}
      <div class="mb-3">
        <input type="text" name="alamat" placeholder="Alamat"
          value="{{ old('alamat', $rumahsakit->alamat) }}"
          class="form-control @error('alamat') is-invalid @enderror">
        @error('alamat')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- Email --}}
      <div class="mb-3">
        <input type="email" name="email" placeholder="Email"
          value="{{ old('email', $rumahsakit->email) }}"
          class="form-control @error('email') is-invalid @enderror">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- Telepon --}}
      <div class="mb-3">
        <input type="number" name="telepon" placeholder="Telepon"
          value="{{ old('telepon', $rumahsakit->telepon) }}"
          class="form-control @error('telepon') is-invalid @enderror">
        @error('telepon')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">Update</button>
      <a href="{{ route('rumahsakit.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
@endsection
