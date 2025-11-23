@extends('admin.dashboard')

@section('content')
<h3>Edit Kategori</h3>

<form action="/admin/kategori/update/{{ $cat->id }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input name="nama_kategori" class="form-control" value="{{ $cat->nama_kategori }}">
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
