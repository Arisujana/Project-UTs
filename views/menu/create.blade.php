@extends('layouts.app')
@section('content')
<h1>Tambah Menu</h1>
<form method="POST" action="{{ route('menu.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" step="0.01" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection