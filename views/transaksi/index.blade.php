@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: linear-gradient(135deg, #f1f9ff 0%, #e3f2fd 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            
            <!-- Tombol Kembali ke Dashboard -->
            <div class="mb-4 d-flex justify-content-start">
                <a href="{{ route('dashboard') }}" 
                   class="btn btn-outline-primary fw-semibold shadow-sm" 
                   style="border-radius: 10px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                </a>
            </div>

            <div class="card shadow-lg border-0" 
                 style="border-radius: 20px; background: rgba(255,255,255,0.9); backdrop-filter: blur(10px);">
                <div class="card-header text-white d-flex justify-content-between align-items-center"
                     style="background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 20px 20px 0 0;">
                    <h3 class="fw-bold mb-0">Daftar Transaksi</h3>
                    <a href="{{ route('transaksi.create') }}" 
                       class="btn btn-light fw-semibold shadow-sm" 
                       style="border-radius: 10px;">
                        <i class="fas fa-plus"></i> Tambah Transaksi
                    </a>
                </div>

                <div class="card-body px-4 py-4">
                    <!-- Form Pencarian -->
                    <form method="GET" class="mb-4">
                        <div class="input-group shadow-sm">
                            <input type="text" name="search" class="form-control form-control-lg" 
                                   placeholder="Cari berdasarkan nama pembeli atau menu..." 
                                   value="{{ request('search') }}" style="border-radius: 10px 0 0 10px;">
                            <button class="btn btn-primary px-4" type="submit" 
                                    style="border-radius: 0 10px 10px 0;">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </form>

                    <!-- Tabel Transaksi -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center shadow-sm">
                            <thead class="table-primary">
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 15%">Pembeli</th>
                                    <th style="width: 20%">Menu</th>
                                    <th style="width: 10%">Jumlah</th>
                                    <th style="width: 15%">Total Harga</th>
                                    <th style="width: 15%">Tanggal</th>
                                    <th style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksi as $item)
                                <tr>
                                    <td><span class="badge bg-secondary">{{ $item->id }}</span></td>
                                    <td class="fw-semibold">{{ $item->pembeli->nama }}</td>
                                    <td>{{ $item->menu->nama_menu }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td class="text-success fw-bold">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('transaksi.show', $item) }}" 
                                           class="btn btn-info btn-sm me-1 shadow-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{ route('transaksi.edit', $item) }}" 
                                           class="btn btn-warning btn-sm me-1 shadow-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('transaksi.destroy', $item) }}" 
                                              style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm shadow-sm" 
                                                    onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-muted">Tidak ada transaksi ditemukan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $transaksi->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styling -->
<style>
    body {
        background: linear-gradient(120deg, #c2e9fb 0%, #a1c4fd 100%);
        font-family: 'Poppins', sans-serif;
    }

    .card {
        transition: transform 0.25s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .table th {
        background-color: #007bff !important;
        color: white;
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f8ff;
        transform: scale(1.01);
        transition: all 0.2s ease;
    }

    .btn {
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
    }

    .btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }
</style>
@endsection
