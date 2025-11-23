@extends('member.dashboard')

@section('content')
<h3>Buat Toko</h3>

<form method="POST" enctype="multipart/form-data" action="/member/toko/store">
    @csrf
    <input type="text" name="nama_toko" class="form-control mb-2" placeholder="Nama Toko" required>
    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi" required></textarea>
    <input type="text" name="kontak_toko" class="form-control mb-2" placeholder="Nomor WA" required>
    <input type="text" name="alamat" class="form-control mb-2" placeholder="Alamat" required>
    <label>Logo / Gambar Toko</label>
    <input type="file" name="gambar" class="form-control mb-2">
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
