@forelse($pasiens as $p)
  <tr id="row-p-{{ $p->id }}">
    <td>{{ $p->id }}</td>
    <td>{{ $p->nama_pasien }}</td>
    <td>{{ $p->alamat }}</td>
    <td>{{ $p->no_telpon }}</td>
    <td>{{ $p->rumahSakit->nama_rumah_sakit }}</td>
    <td>
      <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
      <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $p->id }}">Hapus</button>
    </td>
  </tr>
@empty
  <tr>
    <td colspan="6" class="text-center">Tidak ada data</td>
  </tr>
@endforelse
