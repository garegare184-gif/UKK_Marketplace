@extends('admin.dashboard')

@section('content')

<style>
    /* WARNA UTAMA BURGUNDY */
    :root {
        --burgundy: #7b1e3b;
        --burgundy-dark: #5e162d;
        --burgundy-soft: #f8eef1;
    }

    h3 {
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--burgundy);
        animation: fadeDown 0.6s ease;
    }

    /* Tombol */
    .btn-primary {
        background: var(--burgundy);
        border: none;
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: var(--burgundy-dark);
        transform: scale(1.05);
    }

    /* TABEL */
    table.table {
        border-radius: 15px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(0,0,0,0.12);
        animation: fadeUp 0.6s ease;
    }

    table.table thead {
        background: var(--burgundy-soft);
        border-bottom: 2px solid var(--burgundy);
    }

    table.table thead th {
        font-weight: 700;
        color: var(--burgundy-dark);
        padding: 14px;
    }

    table.table tbody tr {
        vertical-align: middle;
        transition: 0.25s;
    }

    table.table tbody tr:hover {
        background: #fdf4f6;
        transform: scale(1.01);
    }

    table.table td {
        padding: 13px;
        color: #2d2d2d;
    }

    /* Tombol aksi */
    .btn-warning,
    .btn-danger {
        border-radius: 7px;
        padding: 6px 13px;
        font-size: 13px;
        transition: 0.25s;
    }

    .btn-warning:hover,
    .btn-danger:hover {
        transform: scale(1.07);
    }

    /* Gambar */
    img {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    img:hover {
        transform: scale(1.1);
    }

    /* ANIMASI */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

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
