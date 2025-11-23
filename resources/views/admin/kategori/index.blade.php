@extends('admin.dashboard')

@section('content')
<h3>Kelola Kategori</h3>

<a href="/admin/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>

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
