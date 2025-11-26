@extends('admin.dashboard')

@section('content')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* Fade-in animasi */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Tombol elegan */
    .btn-primary {
        background: #6a1a2f;
        border: none;
    }
    .btn-primary:hover {
        background: #4b0f1f;
    }

    .btn-warning {
        background: #e6a137;
        border: none;
        color: white;
    }
    .btn-warning:hover {
        background: #c9872e;
    }

    .btn-danger {
        background: #c0392b;
        border: none;
    }
    .btn-danger:hover {
        background: #992d22;
    }

    /* Table elegan */
    table {
        border-radius: 10px;
        overflow: hidden;
    }

    thead {
        background: #6a1a2f;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    tbody tr {
        transition: background 0.2s ease, transform 0.2s ease;
    }

    tbody tr:hover {
        background: #f6e6ea;
        transform: scale(1.01);
    }

    h3 {
        color: #4b0f1f;
        font-weight: 700;
    }

</style>

<div class="fade-in">

    <h3 class="mb-3"><i class="fa-solid fa-users me-2"></i>Kelola User</h3>

    <a href="/admin/user/create" class="btn btn-primary mb-3">
        <i class="fa-solid fa-user-plus me-1"></i> Tambah User
    </a>

    <table class="table table-bordered shadow-sm">
        <thead>
            <tr>
                <th><i class="fa-solid fa-id-card"></i> ID</th>
                <th><i class="fa-solid fa-user"></i> Nama</th>
                <th><i class="fa-solid fa-phone"></i> Kontak</th>
                <th><i class="fa-solid fa-user-tag"></i> Username</th>
                <th><i class="fa-solid fa-shield"></i> Role</th>
                <th><i class="fa-solid fa-gears"></i> Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->kontak }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <a href="/admin/user/edit/{{ $u->id }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="/admin/user/delete/{{ $u->id }}" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus?')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
