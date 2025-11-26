@extends('admin.dashboard')

@section('content')

<style>
    :root {
        --burgundy: #7b1e3b;
        --burgundy-dark: #5e162d;
        --burgundy-soft: #f8eef1;
    }

    h3 {
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--burgundy);
        animation: fadeDown 0.6s ease;
    }

    form {
        background: #ffffff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.12);
        animation: fadeUp 0.6s ease;
        width: 100%;
        max-width: 450px;
    }

    label {
        font-weight: 600;
        color: var(--burgundy-dark);
    }

    input.form-control {
        border-radius: 8px;
        border: 1.8px solid #d5c6cb;
        transition: 0.25s;
    }

    input.form-control:focus {
        border-color: var(--burgundy);
        box-shadow: 0 0 6px rgba(123, 30, 59, 0.3);
        transform: scale(1.02);
    }

    .btn-primary {
        background: var(--burgundy);
        border: none;
        border-radius: 10px;
        padding: 9px 20px;
        font-weight: 600;
        transition: 0.25s;
    }

    .btn-primary:hover {
        background: var(--burgundy-dark);
        transform: scale(1.07);
    }

    /* Animasi */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<h3>Tambah Kategori</h3>

<form action="/admin/kategori/store" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input name="nama_kategori" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection
