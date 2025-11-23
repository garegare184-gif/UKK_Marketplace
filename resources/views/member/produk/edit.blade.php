@extends('member.dashboard')

@section('content')
<div class="container mt-4">

    <h3>Edit Produk</h3>
    <form action="/member/produk/update/, {{ $produk->id_produk }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <label>Nama Produk</label>
        <input type="text" name="nama" value="{{ $produk->nama }}" class="form-control">
    
        <label>Harga</label>
        <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control">
    
        <label>Kategori</label>
        <select name="id_kategori" class="form-control">
            @foreach($kategori as $k)
                <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
    
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
    
        <label>Gambar Lama</label><br>
        <img src="/uploads/{{ $produk->gambar }}" width="100"><br><br>
    
        <label>Ganti Gambar</label>
        <input type="file" name="gambar" class="form-control">
    
        <br>
    
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
