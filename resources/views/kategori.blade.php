@extends('beranda')

@section('content')

<div class="container mt-4">

    <h2 class="fw-bold mb-4">Kategori: {{ $kategori->nama_kategori }}</h2>

    <div class="row">
        @forelse ($product as $p)
        <div class="col-md-3 mb-4">
            <div class="card h-100">

                @if($p->gambar)
                    <img src="/uploads/{{ $p->gambar }}" 
                         class="card-img-top" height="180" 
                         style="object-fit: cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama_produk }}</h5>

                    <p class="text-danger fw-bold">
                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                    </p>
                </div>

                <a href="/produk/{{ $p->id_produk }}" 
                   class="btn btn-primary btn-sm w-100">Detail</a>

            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <h5 class="text-muted">Tidak ada produk di kategori ini</h5>
        </div>
        @endforelse
    </div>

</div>

@endsection
