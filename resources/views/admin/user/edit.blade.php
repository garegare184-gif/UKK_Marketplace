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

    h3 {
        color: #4b0f1f;
        font-weight: 700;
        margin-bottom: 25px;
    }

    label {
        font-weight: 600;
        color: #6a1a2f;
    }

    .form-control {
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: #6a1a2f;
        box-shadow: 0 0 8px rgba(106, 26, 47, 0.3);
    }

    .btn-primary {
        background-color: #6a1a2f;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #4b0f1f;
        transform: scale(1.03);
    }

    .card-form {
        background: #ffffffdd;
        backdrop-filter: blur(6px);
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        max-width: 500px;
        margin: auto;
    }

</style>

<div class="fade-in card-form">

    <h3><i class="fa-solid fa-user-pen me-2"></i>Edit User</h3>

    <form action="/admin/user/update/{{ $user->id }}" method="POST">
        @csrf

        <div class="mb-3">
            <label><i class="fa-solid fa-user me-1"></i> Nama</label>
            <input name="nama" class="form-control" value="{{ $user->nama }}" required>
        </div>

        <div class="mb-3">
            <label><i class="fa-solid fa-phone me-1"></i> Kontak</label>
            <input name="kontak" class="form-control" value="{{ $user->kontak }}" required>
        </div>

        <div class="mb-3">
            <label><i class="fa-solid fa-user-tag me-1"></i> Username</label>
            <input name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label><i class="fa-solid fa-key me-1"></i> Password (isi jika ingin ganti)</label>
            <input name="password" class="form-control" type="password">
        </div>

        <div class="mb-3">
            <label><i class="fa-solid fa-shield me-1"></i> Role</label>
            <select name="role" class="form-control">
                <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
                <option value="member" {{ $user->role=='member' ? 'selected' : '' }}>Member</option>
            </select>
        </div>

        <button class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk me-1"></i> Update</button>
    </form>

</div>

@endsection
