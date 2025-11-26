@extends('admin.dashboard')

@section('content')

<style>
    :root {
        --burgundy: #800020;
        --burgundy-light: #a8324c;
    }

    h3 {
        color: var(--burgundy);
        font-weight: 700;
        margin-bottom: 20px;
        animation: fadeDown 0.6s ease-out;
    }

    /* Tombol */
    .btn-burgundy {
        background-color: var(--burgundy);
        border-color: var(--burgundy);
        color: #fff;
        transition: 0.3s ease;
    }

    .btn-burgundy:hover {
        background-color: var(--burgundy-light);
        border-color: var(--burgundy-light);
        transform: translateY(-2px);
    }

    /* Table */
    table tbody tr {
        transition: background 0.3s, transform 0.2s;
    }

    table tbody tr:hover {
        background: #f8e6ec;
        transform: scale(1.01);
    }

    .table th {
        background-color: var(--burgundy);
        color: white;
        text-align: center;
    }

    /* Animasi masuk */
    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    table {
        animation: fadeIn 0.8s ease-out;
    }
</style>

<h3>Kelola Kategori</h3>

<a href="/admin/kategori/create" class="btn btn-burgundy mb-3">Tambah Kategori</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nama_kategori }}</td>
            <td>
                <a href="/admin/kategori/edit/{{ $c->id }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="/admin/kategori/delete/{{ $c->id }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus kategori?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
