@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Daftar Rumah Sakit</h2>

    {{-- Flash message --}}
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('rumahsakit.create') }}" class="btn btn-primary mb-3">+ Tambah Rumah Sakit</a>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($rumahsakits as $rs)
          <tr id="row-rs-{{ $rs->id }}">
            <td>{{ $rs->id }}</td>
            <td>{{ $rs->nama_rumah_sakit }}</td>
            <td>{{ $rs->alamat }}</td>
            <td>{{ $rs->email }}</td>
            <td>{{ $rs->telepon }}</td>
            <td>
              <a href="{{ route('rumahsakit.edit', $rs->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <button class="btn btn-danger btn-sm btn-delete"
                data-id="{{ $rs->id }}">Hapus</button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center">Tidak ada data</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <script>
    $(document).on('click', '.btn-delete', function() {
      if (confirm('Yakin ingin menghapus data ini?')) {
        let id = $(this).data('id');
        $.ajax({
          url: '/rumahsakit/' + id,
          type: 'DELETE',
          data: {
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $('#row-rs-' + id).remove();
            alert(response.success);
          }
        });
      }
    });
  </script>
@endsection
