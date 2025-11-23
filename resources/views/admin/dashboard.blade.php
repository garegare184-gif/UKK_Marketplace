<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #800020;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 12px 20px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #a0002a;
            color: #fff;
        }

        /* Content area */
        .content {
            margin-left: 250px;
            padding: 25px;
        }
    </style>
</head>
<body>

@if(session('role') != 'admin')
    <script>window.location = "/";</script>
@endif

<!-- SIDEBAR -->
<div class="sidebar">
    <h4 class="text-center text-white mb-4">Admin</h4>

    <a class="nav-link" href="/admin/dasboard">Dashboard</a>
    <a class="nav-link" href="/admin/user">User</a>
    <a class="nav-link" href="/admin/toko">Management Toko</a>
    <a class="nav-link" href="/admin/kategori">Kategori</a>
    <a class="nav-link" href="/admin/products">Management Produk</a>

    <hr class="bg-light">

    <div class="text-center">
        <p class="text-white mb-1">Halo, {{ session('nama') }}</p>
        <a href="/logout" class="nav-link">Logout</a>
    </div>
</div>
<!-- CONTENT -->
<div class="content">
    @yield('content')
    <!-- Tempat konten halaman -->
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
