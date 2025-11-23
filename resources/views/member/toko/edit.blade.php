@extends('member.dashboard')

@section('content')
<h3>Edit Toko</h3>

<form method="POST" enctype="multipart/form-data" action="/member/toko/update/{{ $toko->id_toko }}">
    @csrf
    <input type="text" name="nama_toko" class="form-control mb-2" value="{{ $toko->nama_toko }}" required>
    <textarea name="deskripsi" class="form-control mb-2" required>{{ $toko->deskripsi }}</textarea>
    <input type="text" name="kontak_toko" class="form-control mb-2" value="{{ $toko->kontak_toko }}" required>
    <input type="text" name="alamat" class="form-control mb-2" value="{{ $toko->alamat }}" required>

    @if($toko->gambar)
        <p>Gambar saat ini:</p>
        <img src="/toko/{{ $toko->gambar }}" width="100">
    @endif

    <label>Ganti Gambar (opsional)</label>
    <input type="file" name="gambar" class="form-control mb-2">

    <button class="btn btn-success">Update</button>
</form>
@endsection
