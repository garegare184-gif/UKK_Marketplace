@extends('admin.dashboard')

@section('content')
<h3>Tambah Produk</h3>

<form action="/admin/products/store" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Kategori</label>
    <select name="id_kategori" class="form-select">
        @foreach($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
        @endforeach
    </select><br>

    <label>Toko</label>
    <select name="id_toko" class="form-select">
        @foreach($toko as $t)
            <option value="{{ $t->id }}">{{ $t->nama_toko }}</option>
        @endforeach
    </select><br>

    <label>Nama Produk</label>
    <input type="text" name="nama_produk" class="form-control"><br>

    <label>Harga</label>
    <input type="number" name="harga" class="form-control"><br>

    <label>Stok</label>
    <input type="number" name="stok" class="form-control"><br>

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"></textarea><br>

    <label>Gambar</label>
    <input type="file" name="gambar" class="form-control"><br>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
