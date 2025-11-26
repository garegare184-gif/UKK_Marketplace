@extends('admin.dashboard')

@section('content')
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* Fade In Animation */
        .fade-in {
            animation: fadeIn 0.8s ease-in-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Card Hover Animation */
        .card-animate {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            border-radius: 15px;
        }

        .card-animate:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 10px 25px rgba(0,0,0,0.18) !important;
        }

        .icon {
            font-size: 36px;
            margin-bottom: 8px;
            color: #6a1a2f;
        }

        h5 {
            color: #6a1a2f;
            font-weight: 600;
        }

        h2 {
            color: #4b0f1f;
            font-weight: 700;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-5 fade-in">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm card-animate">
                <i class="fa-solid fa-users icon"></i>
                <h5>Total User</h5>
                <h3>{{ $totalUser }}</h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm card-animate">
                <i class="fa-solid fa-layer-group icon"></i>
                <h5>Total Kategori</h5>
                <h3>{{ $totalCategory }}</h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm card-animate">
                <i class="fa-solid fa-box-open icon"></i>
                <h5>Total Produk</h5>
                <h3>{{ $totalProduct }}</h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm card-animate">
                <i class="fa-solid fa-store icon"></i>
                <h5>Total Toko</h5>
                <h3>{{ $totalToko }}</h3>
            </div>
        </div>

    </div>

</div>

</body>
</html>
@endsection
