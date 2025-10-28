@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                <div class="card-header bg-gradient-success text-white text-center py-4" style="border-radius: 20px 20px 0 0; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                    <h1 class="mb-0 fw-bold">
                        <i class="fas fa-utensils fa-2x me-3"></i> Detail Menu
                    </h1>
                    <p class="mb-0 mt-2 opacity-75">Informasi lengkap tentang menu ini</p>
                </div>
                <div class="card-body p-5">
                    <!-- Detail Menu -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5 class="text-success fw-bold">
                                    <i class="fas fa-tag me-2"></i>Nama Menu
                                </h5>
                                <p class="fs-4 text-dark">{{ $menu->nama_menu }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5 class="text-success fw-bold">
                                    <i class="fas fa-dollar-sign me-2"></i>Harga
                                </h5>
                                <p class="fs-4 text-dark">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5 class="text-success fw-bold">
                                    <i class="fas fa-boxes me-2"></i>Stok
                                </h5>
                                <p class="fs-4 text-dark">{{ $menu->stok }} unit</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                        </a>
                        <a href="{{ route('menu.index') }}" class="btn btn-success btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                            <i class="fas fa-list me-2"></i>Kembali ke Menu
                        </a>
                    </div>
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
</style>
@endsection
