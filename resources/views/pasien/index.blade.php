@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Daftar Pasien</h2>

    {{-- Flash message --}}
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">+ Tambah Pasien</a>

    {{-- Filter Rumah Sakit --}}
    <div class="mb-3">
      <select id="filter-rs" class="form-control w-25">
        <option value="">-- Filter Rumah Sakit --</option>
        @foreach ($rumahsakits as $rs)
          <option value="{{ $rs->id }}">{{ $rs->nama_rumah_sakit }}</option>
        @endforeach
      </select>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Pasien</th>
          <th>Alamat</th>
          <th>No Telpon</th>
          <th>Rumah Sakit</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="pasien-table">
        @forelse($pasiens as $p)
          <tr id="row-p-{{ $p->id }}">
            <td>{{ $p->id }}</td>
            <td>{{ $p->nama_pasien }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->no_telpon }}</td>
            <td>{{ $p->rumahSakit->nama_rumah_sakit }}</td>
            <td>
              <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <button class="btn btn-danger btn-sm btn-delete"
                data-id="{{ $p->id }}">Hapus</button>
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
    // Hapus dengan AJAX
    $(document).on('click', '.btn-delete', function() {
      if (confirm('Yakin ingin menghapus data ini?')) {
        let id = $(this).data('id');
        $.ajax({
          url: '/pasien/' + id,
          type: 'DELETE',
          data: {
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $('#row-p-' + id).remove();
            alert(response.success);
          }
        });
      }
    });

    // Filter dengan AJAX
    $('#filter-rs').on('change', function() {
      let rs_id = $(this).val();
      $.ajax({
        url: "{{ route('pasien.index') }}",
        type: 'GET',
        data: {
          rumah_sakit_id: rs_id
        },
        success: function(response) {
          $('#pasien-table').html(response.html);
        }
      });
    });
  </script>
@endsection
