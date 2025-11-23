@extends('member.dashboard')

@section('content')
<h3>Toko Saya</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(!$toko)
    <p>Anda belum memiliki toko.</p>
    <a href="/member/toko/create" class="btn btn-primary">Buat Toko</a>
@else
    <div class="card" style="width: 18rem;">
        @if($toko->gambar)
            <img src="/toko/{{ $toko->gambar }}" class="card-img-top">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $toko->nama_toko }}</h5>
            <p class="card-text">{{ $toko->deskripsi }}</p>
            <p>Kontak: {{ $toko->kontak_toko }}</p>
            <p>Alamat: {{ $toko->alamat }}</p>
            <a href="/member/toko/edit/{{ $toko->id_toko }}" class="btn btn-warning">Edit</a>
            <a href="/member/toko/delete/{{ $toko->id_toko }}" class="btn btn-danger" 
               onclick="return confirm('Hapus toko? Semua produk ikut terhapus!')">Hapus</a>
        </div>
    </div>
@endif
@endsection
