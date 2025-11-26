@extends('admin.dashboard')

@section('content')

<style>
    :root {
        --burgundy: #800020;
        --burgundy-light: #a8324c;
        --soft-bg: #f9f0f3;
    }

    h3 {
        color: var(--burgundy);
        font-weight: 700;
        margin-bottom: 25px;
        animation: fadeDown 0.6s ease-out;
    }

    form {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        animation: fadeIn 0.8s ease-in-out;
        border-top: 4px solid var(--burgundy);
    }

    label {
        font-weight: 600;
        color: var(--burgundy);
        margin-top: 10px;
    }

    .form-control, .form-select {
        transition: 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--burgundy);
        box-shadow: 0 0 6px rgba(128, 0, 32, 0.4);
    }

    .btn-burgundy {
        background-color: var(--burgundy);
        border-color: var(--burgundy);
        color: #fff;
        transition: 0.3s ease;
        padding: 8px 18px;
        font-weight: 600;
    }

    .btn-burgundy:hover {
        background-color: var(--burgundy-light);
        border-color: var(--burgundy-light);
        transform: translateY(-2px);
    }

    /* Animasi */
    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
</style>

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

    <button class="btn btn-burgundy">Simpan</button>
</form>

@endsection
