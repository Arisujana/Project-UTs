@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">
    <div class="container">
        <h1 class="text-center mb-5" style="color: #333; font-weight: bold; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
            <i class="fas fa-store-alt text-warning"></i> Dashboard Warung Paktut
        </h1>
        
        <div class="row g-4">
            <!-- Card Pembeli -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100" style="border-radius: 15px; transition: transform 0.3s ease;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title text-primary fw-bold">Pembeli</h5>
                        <p class="card-text text-muted">Kelola data pembeli dengan mudah dan efisien.</p>
                        <a href="{{ route('pembeli.index') }}" class="btn btn-primary btn-lg rounded-pill px-4">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Card Menu -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100" style="border-radius: 15px; transition: transform 0.3s ease;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-utensils fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title text-success fw-bold">Menu</h5>
                        <p class="card-text text-muted">Kelola menu favorit pelanggan.</p>
                        <a href="{{ route('menu.index') }}" class="btn btn-success btn-lg rounded-pill px-4">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Card Transaksi -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100" style="border-radius: 15px; transition: transform 0.3s ease;">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-shopping-cart fa-3x text-info"></i>
                        </div>
                        <h5 class="card-title text-info fw-bold">Transaksi</h5>
                        <p class="card-text text-muted">Kelola transaksi pembelian dengan cepat.</p>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-info btn-lg rounded-pill px-4">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-10px);
    }
</style>
@endsection