@extends('admin.dashboard')

@section('content')
<h3>Tambah Toko</h3>

<form action="/admin/toko/store" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Toko</label>
    <input type="text" name="nama_toko" class="form-control mb-2">

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control mb-2"></textarea>

    <label>Kontak WhatsApp</label>
    <input type="text" name="kontak_toko" class="form-control mb-2">

    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control mb-2">

    <label>Pemilik (Member)</label>
    <select name="id_user" class="form-control mb-2">
        <option value="">-- Pilih Member --</option>
        @foreach($users as $u)
        <option value="{{ $u->id }}">{{ $u->nama }}</option>
        @endforeach
    </select>

    <label>Gambar Toko</label>
    <input type="file" name="gambar" class="form-control mb-3">

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection
