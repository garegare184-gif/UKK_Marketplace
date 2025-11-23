@extends('admin.dashboard')

@section('content')
<h3>Tambah User</h3>

<form action="/admin/user/store" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nama</label>
        <input name="nama" class="form-control">
    </div>

    <div class="mb-2">
        <label>Kontak</label>
        <input name="kontak" class="form-control">
    </div>

    <div class="mb-2">
        <label>Username</label>
        <input name="username" class="form-control">
    </div>

    <div class="mb-2">
        <label>Password</label>
        <input name="password" class="form-control" type="password">
    </div>

    <div class="mb-2">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="member">Member</option>
        </select>
    </div>

    <button class="btn btn-primary mt-2">Simpan</button>
</form>

@endsection
