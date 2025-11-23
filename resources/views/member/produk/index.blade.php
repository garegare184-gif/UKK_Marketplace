@extends('member.dashboard')

@section('content')
<div class="container mt-4">
    <h3>Produk Saya</h3>
    <a href="/member/produk/create" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $p)
            <tr>
                <td><img src="/uploads/{{ $p->gambar }}" width="60"></td>
                <td>{{ $p->nama_produk }}</td>
                <td>Rp {{ number_format($p->harga) }}</td>
                <td>{{ $p->stok }}</td>
                <td>
                    <a href="/member/produk/edit/{{ $p->id_produk }}" class="btn btn-warning btn-sm">Edit</a>
                    <a onclick="return confirm('Hapus produk?')" href="/member/produk/delete/{{ $p->id_produk }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
