@extends('admin.dashboard')

@section('content')
<h3 class="mb-3">Edit Produk</h3>

<form action="/admin/products/update/{{ $product->id_produk }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- pilih kategori -->
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="id_kategori" class="form-select">
            @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    @if($k->id == $product->id_kategori) selected @endif>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- pilih toko -->
    <div class="mb-3">
        <label class="form-label">Toko</label>
        <select name="id_toko" class="form-select">
            @foreach($toko as $t)
                <option value="{{ $t->id }}"
                    @if($t->id == $product->id_toko) selected @endif>
                    {{ $t->nama_toko }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- nama produk -->
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" value="{{ $product->nama_produk }}">
    </div>

    <!-- harga -->
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $product->harga }}">
    </div>

    <!-- stok -->
    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $product->stok }}">
    </div>

    <!-- deskripsi -->
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $product->deskripsi }}</textarea>
    </div>

    <!-- gambar sekarang -->
    <div class="mb-3">
        <label class="form-label">Gambar Saat Ini</label><br>
        @if($product->gambar)
            <img src="/uploads/{{ $product->gambar }}" width="100">
        @else
            <small>Tidak ada gambar</small>
        @endif
    </div>

    <!-- upload gambar baru -->
    <div class="mb-3">
        <label class="form-label">Gambar Baru (opsional)</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <button class="btn btn-success">Update Produk</button>
</form>

@endsection
