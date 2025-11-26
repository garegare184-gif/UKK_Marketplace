@extends('member.dashboard')

@section('content')

<style>
    .toko-card {
        width: 100%;
        max-width: 420px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        transition: 0.3s ease;
        background: #fff;
    }

    .toko-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }

    .toko-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-bottom: 1px solid #eee;
    }

    .toko-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #800020;
    }

    .toko-info {
        font-size: 15px;
        color: #555;
    }

    .btn-custom {
        width: 48%;
    }

    .btn-warning, .btn-danger {
        width: 100%;
        margin-top: 8px;
    }

    .btn-create {
        background-color: #800020;
        border: none;
    }

    .btn-create:hover {
        background-color: #a33252;
    }

    .alert {
        max-width: 420px;
    }
</style>

<h3 class="mb-4">Toko Saya</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(!$toko)

    <p class="text-muted">Anda belum memiliki toko.</p>
    <a href="/member/toko/create" class="btn btn-primary btn-create">Buat Toko</a>

@else

    <div class="toko-card">

        @if($toko->gambar)
            <img src="/toko/{{ $toko->gambar }}" class="toko-img">
        @endif

        <div class="card-body p-4">
            <h5 class="toko-title">{{ $toko->nama_toko }}</h5>

            <p class="toko-info mt-2">{{ $toko->deskripsi }}</p>

            <p class="toko-info"><strong>Kontak:</strong> {{ $toko->kontak_toko }}</p>
            <p class="toko-info"><strong>Alamat:</strong> {{ $toko->alamat }}</p>

            <a href="/member/toko/edit/{{ $toko->id_toko }}" 
               class="btn btn-warning mt-3">Edit Toko</a>

            <a href="/member/toko/delete/{{ $toko->id_toko }}" 
               class="btn btn-danger"
               onclick="return confirm('Hapus toko? Semua produk ikut terhapus!')">Hapus Toko</a>
        </div>

    </div>

@endif

@endsection
