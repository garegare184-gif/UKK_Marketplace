@extends('admin.dashboard')

@section('content')
<h3>Edit Toko</h3>

<form action="/admin/toko/update/{{ $toko->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Toko</label>
    <input type="text" name="nama_toko" class="form-control mb-2" value="{{ $toko->nama_toko }}">

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control mb-2">{{ $toko->deskripsi }}</textarea>

    <label>Kontak WhatsApp</label>
    <input type="text" name="kontak_toko" class="form-control mb-2" value="{{ $toko->kontak_toko }}">

    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control mb-2" value="{{ $toko->alamat }}">

    <label>Pemilik (Member)</label>
    <select name="id_user" class="form-control mb-2">
        @foreach($users as $u)
        <option value="{{ $u->id }}" {{ $toko->id_user == $u->id ? 'selected' : '' }}>
            {{ $u->nama }}
        </option>
        @endforeach
    </select>

    <label>Gambar Baru (opsional)</label>
    <input type="file" name="gambar" class="form-control mb-3">

    <button class="btn btn-primary">Update</button>
</form>

@endsection
