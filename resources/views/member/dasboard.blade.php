@extends('member.dashboard')

@section('content')

<div class="container mt-4">
    <h2 class="fw-bold mb-4">Dashboard Member</h2>

    <div class="row">

        <!-- TOTAL PRODUK DI TOKO SENDIRI -->
        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Total Produk Saya</h5>
                <h3>{{ $totalProduct }}</h3>
            </div>
        </div>

    </div>

    @if(!$toko)
        <div class="alert alert-warning mt-3">
            Anda belum memiliki toko. <a href="/member/toko" class="fw-bold">Buat toko sekarang</a>.
        </div>
    @endif

</div>

@endsection
