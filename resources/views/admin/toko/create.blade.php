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
    }

    label {
        font-weight: 600;
        color: var(--burgundy-dark);
        margin-top: 10px;
        margin-bottom: 4px;
    }

    input.form-control,
    textarea.form-control,
    select.form-control {
        border-radius: 8px;
        border: 1.8px solid #d5c6cb;
        transition: 0.25s;
    }

    input.form-control:focus,
    textarea.form-control:focus,
    select.form-control:focus {
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

<h3>Tambah Toko</h3>

<form action="/admin/toko/store" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Toko</label>
    <input type="text" name="nama_toko" class="form-control mb-2">

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control mb-2" rows="3"></textarea>

    <label>Kontak WhatsApp</label>
    <input type="text" name="kontak_toko" class="form-control mb-2">

    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control mb-2">

    <label>Pemilik (Member)</label>
    <select name="id_user" class="form-control mb-2">
        <option value="">-- Pilih Member --</option>
        @foreach($users as $u)
        <option value="{{ $u->id }}">{{ $u->nama }}</option>
        @endforeach
    </select>

    <label>Gambar Toko</label>
    <input type="file" name="gambar" class="form-control mb-3">

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection
