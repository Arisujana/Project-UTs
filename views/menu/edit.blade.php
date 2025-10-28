@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                <div class="card-header bg-gradient-success text-white text-center py-4" style="border-radius: 20px 20px 0 0; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                    <h1 class="mb-0 fw-bold">
                        <i class="fas fa-edit fa-2x me-3"></i> Edit Menu
                    </h1>
                    <p class="mb-0 mt-2 opacity-75">Perbarui informasi menu dengan mudah</p>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('menu.update', $menu) }}">
                        @csrf @method('PUT')
                        
                        <!-- Nama Menu -->
                        <div class="mb-4">
                            <label for="nama_menu" class="form-label fw-bold text-success">
                                <i class="fas fa-tag me-2"></i>Nama Menu
                            </label>
                            <input type="text" name="nama_menu" id="nama_menu" class="form-control form-control-lg shadow-sm" value="{{ $menu->nama_menu }}" required style="border-radius: 10px;">
                        </div>
                        
                        <!-- Harga -->
                        <div class="mb-4">
                            <label for="harga" class="form-label fw-bold text-success">
                                <i class="fas fa-dollar-sign me-2"></i>Harga
                            </label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-0">Rp</span>
                                <input type="number" name="harga" id="harga" class="form-control border-0 shadow-sm" step="0.01" value="{{ $menu->harga }}" required style="border-radius: 0 10px 10px 0;">
                            </div>
                        </div>
                        
                        <!-- Stok -->
                        <div class="mb-4">
                            <label for="stok" class="form-label fw-bold text-success">
                                <i class="fas fa-boxes me-2"></i>Stok
                            </label>
                            <input type="number" name="stok" id="stok" class="form-control form-control-lg shadow-sm" value="{{ $menu->stok }}" required style="border-radius: 10px;">
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                            </a>
                            <div>
                                <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary btn-lg px-4 py-2 me-3 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                                    <i class="fas fa-list me-2"></i>Kembali ke Menu
                                </a>
                                <button type="submit" class="btn btn-success btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                                    <i class="fas fa-save me-2"></i>Update Menu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
    .bg-gradient-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    }
    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }
</style>
@endsection
