<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Marketplace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background-color: #800020; /* Burgundy */
        }
        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {  
            color: #fff !important;
        }
        .navbar-custom .nav-link:hover {
            color: #ffd6e0 !important;
        }
    </style>
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Marketplace</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(100%);"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/toko">Toko</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @if(session('role'))
                    <!-- Jika login -->
                    <li class="nav-item">
                        <span class="nav-link">Halo, {{ session('nama') }} ({{ session('role') }})</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>

                @else
                    <!-- Jika belum login -->
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
<!-- BANNER / HERO -->
<div class="container-fluid p-0">
    <div class="text-white text-center py-5"
         style="
            background: linear-gradient(180deg, #800020 0%, #b34b6d 50%, #ffd6e0 100%);
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
         ">
        <div>
            <h1 class="fw-bold">Selamat Datang di Marketplace</h1>
            <p class="lead">Belanja mudah, cepat, dan aman</p>
            <a href="/produk" class="nav-link">Lihat Produk</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <h3 class="mb-3">Category</h3>

    <div class="row">
        @foreach ($category as $c)
        <div class="col-md-3 mb-3">
            <a href="/kategori{{ $c->id_kategori }}">
                <div class="card p-3 text-center shadow-sm">
                    
                    <!-- ICON FONT AWESOME -->
                    <i class="fa-solid fa-box fa-2x mb-2"></i>

                    <h5 class="mb-0">{{ $c->nama_kategori }}</h5>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


<div class="container mt-5">
    <h3 id="produk" class="mb-4">Produk Terbaru</h3>

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

</div>

<!-- FOOTER -->
<footer class="mt-5 text-white" style="background-color: #800020;">
    <div class="container py-4">

        <div class="row">

            <!-- Kolom 1 -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Marketplace</h5>
                <p>Belanja mudah, cepat, dan aman. Temukan produk terbaik dari berbagai toko.</p>
            </div><br>

            <!-- Kolom -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> 