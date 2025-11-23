@extends('admin.dashboard')

@section('content')
<h3>Kelola User</h3>

<a href="/admin/user/create" class="btn btn-primary mb-3">Tambah User</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->nama }}</td>
            <td>{{ $u->kontak }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->role }}</td>
            <td>
                <a href="/admin/user/edit/{{ $u->id }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="/admin/user/delete/{{ $u->id }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
