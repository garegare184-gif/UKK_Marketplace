@extends('admin.dashboard')

@section('content')
<h3>Edit User</h3>

<form action="/admin/user/update/{{ $user->id }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nama</label>
        <input name="nama" class="form-control" value="{{ $user->nama }}">
    </div>

    <div class="mb-2">
        <label>Kontak</label>
        <input name="kontak" class="form-control" value="{{ $user->kontak }}">
    </div>

    <div class="mb-2">
        <label>Username</label>
        <input name="username" class="form-control" value="{{ $user->username }}">
    </div>

    <div class="mb-2">
        <label>Password (isi jika ingin ganti)</label>
        <input name="password" class="form-control" type="password">
    </div>

    <div class="mb-2">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
            <option value="member" {{ $user->role=='member' ? 'selected' : '' }}>Member</option>
        </select>
    </div>

    <button class="btn btn-primary mt-2">Update</button>
</form>

@endsection
