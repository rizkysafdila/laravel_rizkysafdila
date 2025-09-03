@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Tambah Rumah Sakit</h2>

    <form action="{{ route('rumahsakit.store') }}" method="POST">
      @csrf

      {{-- Nama Rumah Sakit --}}
      <div class="mb-3">
        <input type="text" name="nama_rumah_sakit" placeholder="Nama"
          value="{{ old('nama_rumah_sakit') }}"
          class="form-control @error('nama_rumah_sakit') is-invalid @enderror">
        @error('nama_rumah_sakit')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- Alamat --}}
      <div class="mb-3">
        <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}"
          class="form-control @error('alamat') is-invalid @enderror">
        @error('alamat')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- Email --}}
      <div class="mb-3">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
          class="form-control @error('email') is-invalid @enderror">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- Telepon --}}
      <div class="mb-3">
        <input type="number" name="telepon" placeholder="Telepon" value="{{ old('telepon') }}"
          class="form-control @error('telepon') is-invalid @enderror">
        @error('telepon')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('rumahsakit.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
@endsection
