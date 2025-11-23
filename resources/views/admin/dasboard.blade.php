@extends('admin.dashboard')

@section('content')
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Total User</h5>
                <h3>{{ $totalUser }}</h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Total Kategori</h5>
                <h3>{{ $totalCategory }}</h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Total Produk</h5>
                <h3>{{ $totalProduct }}</h3>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center p-3 shadow-sm">
                <h5>Total Toko</h5>
                <h3>{{ $totalToko }}</h3>
            </div>
        </div>

    </div>

</div>

</body>
</html>
@endsection
