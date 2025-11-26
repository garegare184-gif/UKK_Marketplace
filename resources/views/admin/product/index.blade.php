@extends('admin.dashboard')

@section('content')

<style>
    :root {
        --burgundy: #800020;
        --burgundy-light: #a8324c;
        --soft-bg: #f9f0f3;
    }

    h3 {
        color: var(--burgundy);
        font-weight: 700;
        animation: fadeDown 0.6s ease-out;
    }

    /* Tombol Tambah Produk */
    .btn-burgundy {
        background-color: var(--burgundy);
        border-color: var(--burgundy);
        color: #fff;
        transition: 0.3s ease;
        padding: 8px 18px;
        font-weight: 600;
    }

    .btn-burgundy:hover {
        background-color: var(--burgundy-light);
        border-color: var(--burgundy-light);
        transform: translateY(-2px);
    }

    /* Header tabel */
    table thead th {
        background: var(--burgundy);
        color: white;
        text-align: center;
    }

    /* Hover row */
    table tbody tr {
        transition: 0.25s ease;
    }

    table tbody tr:hover {
        background: #f6e9ed;
        transform: scale(1.01);
    }

    /* Gambar animasi */
    table img {
        border-radius: 5px;
        animation: fadeIn 0.8s ease;
    }

    /* Tabel animasi masuk */
    table {
        animation: fadeIn 0.9s ease;
    }

    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
</style>

<h3 class="mb-3">Kelola Produk</h3>

<a href="/admin/products/create" class="btn btn-burgundy mb-3">+ Tambah Produk</a>

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
