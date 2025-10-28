@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: linear-gradient(135deg, #e0f7fa 0%, #e3f2fd 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" 
                 style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
                <div class="card-header text-white text-center"
                     style="background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 20px 20px 0 0;">
                    <h2 class="mb-0 fw-bold">Detail Pembeli</h2>
                </div>
                <div class="card-body px-5 py-4">
                    <div class="text-center mb-4">
                        <div class="rounded-circle d-inline-flex justify-content-center align-items-center shadow-sm mb-3"
                             style="width: 100px; height: 100px; background: linear-gradient(135deg, #00c6ff, #007bff); color: white; font-size: 2.5rem;">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3 class="fw-bold mb-0">{{ $pembeli->nama }}</h3>
                        <p class="text-muted">Data lengkap pembeli</p>
                    </div>

                    <div class="mb-4">
                        <p class="mb-2"><strong><i class="fas fa-phone-alt me-2 text-primary"></i>Telepon:</strong> {{ $pembeli->telepon }}</p>
                        <p><strong><i class="fas fa-map-marker-alt me-2 text-danger"></i>Alamat:</strong> {{ $pembeli->alamat }}</p>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('pembeli.index') }}" 
                           class="btn btn-outline-secondary px-4 py-2 shadow-sm"
                           style="border-radius: 10px;">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background: linear-gradient(120deg, #c2e9fb 0%, #a1c4fd 100%);
        font-family: 'Poppins', sans-serif;
    }

    .card {
        transition: transform 0.25s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .btn-outline-secondary:hover {
        background: linear-gradient(135deg, #00c6ff, #007bff);
        color: white;
        border: none;
    }
</style>
@endsection
