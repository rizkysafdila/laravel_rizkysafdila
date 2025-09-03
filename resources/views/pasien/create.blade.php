@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Tambah Pasien</h2>

    <form action="{{ route('pasien.store') }}" method="POST">
      @csrf

      {{-- Nama Pasien --}}
      <div class="mb-3">
        <input type="text" name="nama_pasien" placeholder="Nama Pasien"
          value="{{ old('nama_pasien') }}"
          class="form-control @error('nama_pasien') is-invalid @enderror">
        @error('nama_pasien')
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

      {{-- No Telpon --}}
      <div class="mb-3">
        <input type="number" name="no_telpon" placeholder="Telepon" value="{{ old('no_telpon') }}"
          class="form-control @error('no_telpon') is-invalid @enderror">
        @error('no_telpon')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- Rumah Sakit Dropdown --}}
      <div class="mb-3">
        <select name="rumah_sakit_id"
          class="form-control @error('rumah_sakit_id') is-invalid @enderror">
          <option value="">-- Pilih Rumah Sakit --</option>
          @foreach ($rumahsakits as $rs)
            <option value="{{ $rs->id }}"
              {{ old('rumah_sakit_id') == $rs->id ? 'selected' : '' }}>
              {{ $rs->nama_rumah_sakit }}
            </option>
          @endforeach
        </select>
        @error('rumah_sakit_id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
@endsection
