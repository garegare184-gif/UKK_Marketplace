@extends('beranda') 

@section('content')

<div class="container mt-4">

    <h2 class="fw-bold mb-4">Semua Produk</h2>
<div class="container mt-5">
    <h3 class="mb-4">Produk Terbaru</h3>

    <div class="row">
    @foreach ($product as $p)
    <div class="col-md-3 mb-3">
        <div class="card h-100">

            @if($p && $p->gambar)
                <img src="/uploads/{{ $p->gambar }}" class="card-img-top" height="180" style="object-fit: cover;">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $p->nama_produk }}</h5>
                <p class="card-text text-danger fw-bold">
                    Rp {{ number_format($p->harga) }}
                </p>
            </div>
            <a href="/produk/{{ $p->id_produk }}" class="btn btn-primary btn-sm w-100">Detail</a>
        </div>
    </div>
    @endforeach
</div>

    <div class="mt-3">
        {{ $product->links() }}
    </div>

</div>

<style>
    .btn-burgundy {
        background-color: #800020;
    }
    .btn-burgundy:hover {
        background-color: #a2002d;
    }
</style>

@endsection
