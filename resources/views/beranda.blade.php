<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Marketplace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 75px;
        }

        .navbar-custom {
            background-color: #800020;
        }
        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #fff !important;
        }
        .navbar-custom .nav-link:hover {
            color: #ffd6e0 !important;
        }

        /* CATEGORY CARD */
        .category-card {
            border-radius: 18px;
            padding: 25px;
            transition: 0.3s ease;
            border: none;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            cursor: pointer;
        }
        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .category-icon {
            background: #800020;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 26px;
            margin-bottom: 12px;
            transition: 0.3s ease;
        }
        .category-card:hover .category-icon {
            background: #b34b6d;
            transform: scale(1.1);
        }
        .category-name {
            font-weight: 600;
            font-size: 18px;
            color: #800020;
        }
    </style>
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Marketplace</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(100%);"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#category">Category</a></li>
                <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="/toko">Toko</a></li> -->
            </ul>

            <ul class="navbar-nav ms-auto">
                @if(session('role'))
                    <li class="nav-item">
                        <span class="nav-link">Halo, {{ session('nama') }} ({{ session('role') }})</span>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                @endif
            </ul>

        </div>
    </div>
</nav>


<!-- BANNER -->
<div class="container-fluid p-0">
    <div class="text-white text-center py-5"
         style="
            background: linear-gradient(180deg, #800020 0%, #b34b6d 50%, #ffd6e0 100%);
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;">
        <div>
            <h1 class="fw-bold">Selamat Datang di Marketplace</h1>
            <p class="lead">Belanja mudah, cepat, dan aman</p>
            <a href="#produk" class="nav-link">Lihat Produk</a>
        </div>
    </div>
</div>


<!-- CATEGORY -->
<div class="container mt-5">
    <h3 id="category" class="mb-3">Category</h3>

    <div class="row">
        @foreach ($category as $c)
        <div class="col-md-3 mb-4">
            <a href="/kategori{{ $c->id_kategori }}" class="text-decoration-none">
                <div class="category-card text-center">
                    <div class="category-icon">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    <h5 class="category-name">{{ $c->nama_kategori }}</h5>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


<!-- PRODUK -->
<div class="container mt-5">
    <h3 id="produk" class="mb-4">Produk Terbaru</h3>
    <div class="row">

@foreach($product as $p)
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm">

            @if($p->gambar)
                <img src="/uploads/{{ $p->gambar }}" class="card-img-top" style="height: 200px; object-fit: cover;">
            @endif

            <div class="card-body">
                <h5 class="fw-bold">{{ $p->nama_produk }}</h5>
                <p class="text-danger fw-bold">Rp {{ number_format($p->harga) }}</p>

                <!-- ✔️ Tombol WhatsApp dengan auto message -->
                <a href="https://wa.me/6287843103256?text=Halo,%20saya%20ingin%20membeli%20produk%20:%20{{ urlencode($p->nama_produk) }}"
                   target="_blank"
                   class="btn btn-success w-100">
                    <i class="fa-brands fa-whatsapp"></i> Beli via WhatsApp
                </a>
            </div>
        </div>
    </div>
@endforeach

    </div>
</div>


<!-- FOOTER -->
<footer class="mt-5 text-white" style="background-color: #800020;">
    <div class="container py-4">
        <div class="row">

            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Marketplace</h5>
                <p>Belanja mudah, cepat, dan aman. Temukan produk terbaik dari berbagai toko.</p>
            </div>

            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Kontak</h5>
                <p class="mb-1"><strong>Email:</strong> market@marketplace.com</p>
                <p class="mb-1"><strong>Telepon:</strong> 0812-3456-7890</p>
                <p class="mb-1"><strong>Alamat:</strong> Singaparna, Tasikmalaya</p>
            </div>

        </div>

        <hr class="border-light">

        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Marketplace. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
