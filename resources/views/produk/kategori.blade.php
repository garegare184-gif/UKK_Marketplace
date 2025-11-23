<!DOCTYPE html>
<html>
<head>
    <title>Kategori</title>
    <link rel="stylesheet" href="/bootstrap.css">
</head>
<body>

<h2>{{ $kategori->nama_kategori }}</h2>

<div class="row mt-4">
    @foreach($produk as $p)
    <div class="col-md-3 mb-3">
        <div class="card">
            <img src="/uploads/{{ $p->gambar }}" class="card-img-top" height="160" style="object-fit: cover">
            <div class="card-body">
                <h5>{{ $p->nama_produk }}</h5>
                <p class="text-danger fw-bold">Rp {{ number_format($p->harga) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

</body>
</html>
