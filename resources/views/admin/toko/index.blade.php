@extends('admin.dashboard')

@section('content')
<h3>Daftar Toko</h3>

<a href="/admin/toko/create" class="btn btn-primary mb-3">Tambah Toko</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Toko</th>
            <th>Pemilik</th>
            <th>Kontak</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $t)
        <tr>
            <td>{{ $t->nama_toko }}</td>
            <td>{{ $t->pemilik->nama ?? '-' }}</td>
            <td>{{ $t->kontak_toko }}</td>
            <td>
                @if($t->gambar)
                <img src="/toko/{{ $t->gambar }}" width="60">
                @endif
            </td>
            <td>
                <a href="/admin/toko/edit/{{ $t->id }}" class="btn btn-warning btn-sm">Edit</a>
                <a onclick="return confirm('Hapus toko?')" 
                   href="/admin/toko/delete/{{ $t->id }}" 
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
