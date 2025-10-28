@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0" style="border-radius: 25px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(15px);">
                <div class="card-header bg-gradient-pink text-white text-center py-4" style="border-radius: 25px 25px 0 0; background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                    <h1 class="mb-0 fw-bold">
                        <i class="fas fa-user-plus fa-2x me-3"></i> Tambah Pembeli
                    </h1>
                    <p class="mb-0 mt-2 opacity-75">Masukkan data pembeli baru dengan lengkap</p>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('pembeli.store') }}" novalidate>
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama" class="form-label fw-bold text-dark">
                                <i class="fas fa-user me-2"></i>Nama
                            </label>
                            <input type="text" id="nama" name="nama" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nama lengkap" required style="border-radius: 15px; border: 2px solid #e9ecef;">
                            @error('nama')
                                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div class="mb-4">
                            <label for="telepon" class="form-label fw-bold text-dark">
                                <i class="fas fa-phone me-2"></i>Telepon
                            </label>
                            <input type="text" id="telepon" name="telepon" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nomor telepon" required style="border-radius: 15px; border: 2px solid #e9ecef;">
                            @error('telepon')
                                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="alamat" class="form-label fw-bold text-dark">
                                <i class="fas fa-map-marker-alt me-2"></i>Alamat
                            </label>
                            <textarea id="alamat" name="alamat" class="form-control form-control-lg shadow-sm" rows="4" placeholder="Masukkan alamat lengkap" required style="border-radius: 15px; border: 2px solid #e9ecef; resize: none;"></textarea>
                            @error('alamat')
                                <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('pembeli.index') }}" class="btn btn-outline-secondary btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-success btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                                <i class="fas fa-save me-2"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-10px);
        transition: transform 0.4s ease;
    }
    .form-control:focus {
        border-color: #ff6b9d;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 157, 0.25);
    }
    .btn:hover {
        transform: scale(1.05);
    }
    .bg-gradient-pink {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    }
    input::placeholder, textarea::placeholder {
        color: #adb5bd;
        opacity: 0.7;
    }
</style>
@endsection