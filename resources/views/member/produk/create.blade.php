@extends('member.dashboard')

@section('content')
<div class="container mt-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h3>Tambah Produk</h3>

    <form action="/member/produk/store" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control">

        <label>Harga</label>
        <input type="number" name="harga" class="form-control">

        <label>Stok</label>
        <input type="number" name="stok" class="form-control">

        <label>Kategori</label>
        <select name="id_kategori" class="form-control">
            @foreach($kategori as $k)
                <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>

        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control">

        <button class="btn btn-primary mt-3">Simpan</button>
    </form>

</div>
@endsection
