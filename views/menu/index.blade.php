@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: linear-gradient(135deg, #e0f7fa 0%, #e3f2fd 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Tombol Kembali ke Dashboard -->
            <div class="mb-4 d-flex justify-content-start">
                <a href="{{ route('dashboard') }}" 
                   class="btn btn-outline-primary fw-semibold shadow-sm" 
                   style="border-radius: 10px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                </a>
            </div>

            <div class="card shadow-lg border-0" 
                 style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
                <div class="card-header text-white d-flex justify-content-between align-items-center"
                     style="background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 20px 20px 0 0;">
                    <h3 class="fw-bold mb-0">Daftar Menu</h3>
                    <a href="{{ route('menu.create') }}" class="btn btn-light fw-semibold" style="border-radius: 10px;">
                        <i class="fas fa-plus"></i> Tambah Menu
                    </a>
                </div>

                <div class="card-body px-4 py-4">
                    <form method="GET" class="mb-4">
                        <div class="input-group shadow-sm">
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="Cari berdasarkan nama menu..." 
                                   value="{{ request('search') }}" style="border-radius: 10px 0 0 10px;">
                            <button class="btn btn-primary px-4" type="submit" style="border-radius: 0 10px 10px 0;">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center shadow-sm">
                            <thead class="table-primary">
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 30%">Nama Menu</th>
                                    <th style="width: 20%">Harga</th>
                                    <th style="width: 15%">Stok</th>
                                    <th style="width: 30%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($menu as $item)
                                <tr>
                                    <td><span class="badge bg-secondary">{{ $item->id }}</span></td>
                                    <td class="fw-semibold">{{ $item->nama_menu }}</td>
                                    <td class="text-success fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if($item->stok > 0)
                                            <span class="badge bg-success">{{ $item->stok }}</span>
                                        @else
                                            <span class="badge bg-danger">Habis</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('menu.show', $item) }}" class="btn btn-info btn-sm me-1 shadow-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{ route('menu.edit', $item) }}" class="btn btn-warning btn-sm me-1 shadow-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('menu.destroy', $item) }}" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Yakin hapus menu ini?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-muted">Tidak ada menu ditemukan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $menu->appends(request()->query())->links('pagination::bootstrap-5') }}
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
