@extends('admin.dashboard')

@section('content')
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
