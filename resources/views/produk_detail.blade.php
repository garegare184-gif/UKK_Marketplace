@extends('beranda')

@section('content')
<div class="container mt-4">

    <div class="card shadow-lg p-4">

        <div class="row">
            <!-- Gambar Produk -->
            <div class="col-md-5 text-center">
                <img src="{{ $product->gambar ? '/uploads/product/'.$product->gambar : '/noimage.png' }}" 
                     class="img-fluid rounded" style="max-height: 350px;">
            </div>

            <!-- Info Produk -->
            <div class="col-md-7">
                <h2>{{ $product->nama_produk }}</h2>

                <h4 class="text-success mb-3">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </h4>

                <p><strong>Stok:</strong> {{ $product->stok }}</p>

                <p><strong>Kategori:</strong> 
                    {{ $product->kategori->nama_kategori ?? '-' }}
                </p>

                <p><strong>Deskripsi:</strong><br>
                    {{ $product->deskripsi }}
                </p>

                <hr>

                <!-- Tombol Beli -->
                <a href="#" class="btn btn-primary btn-lg w-100">
                    Beli Sekarang
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
