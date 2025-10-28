@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: linear-gradient(135deg, #f1f9ff 0%, #e3f2fd 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0"
                 style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px);">

                <div class="card-header text-white text-center fw-bold"
                     style="background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 20px 20px 0 0;">
                    <h3 class="mb-0">Edit Transaksi</h3>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('transaksi.update', $transaksi) }}">
                        @csrf @method('PUT')

                        <!-- Pilih Pembeli -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Pembeli</label>
                            <select name="id_pembeli" class="form-select shadow-sm" required>
                                <option value="">-- Pilih Pembeli --</option>
                                @foreach($pembeli as $p)
                                <option value="{{ $p->id }}" {{ $transaksi->id_pembeli == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Menu -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Menu</label>
                            <select name="id_menu" class="form-select shadow-sm" required>
                                <option value="">-- Pilih Menu --</option>
                                @foreach($menu as $m)
                                <option value="{{ $m->id }}" {{ $transaksi->id_menu == $m->id ? 'selected' : '' }}>
                                    {{ $m->nama_menu }} - Rp {{ number_format($m->harga, 0, ',', '.') }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jumlah -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control shadow-sm"
                                   value="{{ $transaksi->jumlah }}" required>
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal</label>
                            <input type="datetime-local" name="tanggal" class="form-control shadow-sm"
                                   value="{{ date('Y-m-d\TH:i', strtotime($transaksi->tanggal)) }}" required>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary px-4 shadow-sm" style="border-radius: 10px;">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success px-4 shadow-sm fw-semibold" style="border-radius: 10px;">
                                <i class="fas fa-save"></i> Update Transaksi
                            </button>
                        </div>
                    </form>
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
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    label {
        color: #333;
    }

    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #ced4da;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
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
