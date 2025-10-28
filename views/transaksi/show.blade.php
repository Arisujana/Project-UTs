@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: linear-gradient(135deg, #f1f9ff 0%, #e3f2fd 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0" 
                 style="border-radius: 20px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">

                <div class="card-header text-white text-center fw-bold" 
                     style="background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 20px 20px 0 0;">
                    <h3 class="mb-0"><i class="fas fa-receipt"></i> Detail Transaksi</h3>
                </div>

                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="fw-bold text-secondary"><i class="fas fa-user"></i> Pembeli</label>
                        <p class="fs-5 mb-0">{{ $transaksi->pembeli->nama }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-secondary"><i class="fas fa-utensils"></i> Menu</label>
                        <p class="fs-5 mb-0">{{ $transaksi->menu->nama_menu }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-secondary"><i class="fas fa-sort-numeric-up"></i> Jumlah</label>
                        <p class="fs-5 mb-0">{{ $transaksi->jumlah }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-secondary"><i class="fas fa-money-bill-wave"></i> Total Harga</label>
                        <p class="fs-5 text-success fw-semibold mb-0">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold text-secondary"><i class="fas fa-calendar-alt"></i> Tanggal</label>
                        <p class="fs-6 text-muted mb-0">{{ $transaksi->tanggal }}</p>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('transaksi.index') }}" 
                           class="btn btn-secondary px-4 py-2 fw-semibold shadow-sm" 
                           style="border-radius: 10px;">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styling tambahan -->
<style>
    body {
        background: linear-gradient(120deg, #c2e9fb 0%, #a1c4fd 100%);
        font-family: 'Poppins', sans-serif;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    label {
        color: #444;
    }

    .btn {
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }
</style>
@endsection
