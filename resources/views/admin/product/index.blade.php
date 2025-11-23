@extends('admin.dashboard')

@section('content')
<h3 class="mb-3">Kelola Produk</h3>

<a href="/admin/products/create" class="btn btn-primary mb-3">+ Tambah Produk</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Toko</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Tanggal Upload</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->id_produk }}</td>

            <td>
                @if($p->gambar)
                    <img src="/uploads/{{ $p->gambar }}" width="60">
                @else
                    <small>Tidak ada</small>
                @endif
            </td>

            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
            <td>{{ $p->toko->nama_toko ?? '-' }}</td>
            <td>Rp {{ number_format($p->harga) }}</td>
            <td>{{ $p->stok }}</td>
            <td>{{ $p->tanggal_upload }}</td>

            <td>
                <a href="/admin/products/edit/{{ $p->id_produk }}" class="btn btn-warning btn-sm">Edit</a>

                <a href="/admin/products/delete/{{ $p->id_produk }}" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Hapus produk ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

