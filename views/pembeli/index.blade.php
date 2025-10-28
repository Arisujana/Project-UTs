@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                <div class="card-header bg-gradient-primary text-white text-center py-4" style="border-radius: 20px 20px 0 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h1 class="mb-0 fw-bold">
                        <i class="fas fa-users fa-2x me-3"></i> Daftar Pembeli
                    </h1>
                    <p class="mb-0 mt-2 opacity-75">Kelola data pembeli dengan mudah dan efisien</p>
                </div>
                <div class="card-body p-4">
                    <!-- Form Pencarian -->
                    <form method="GET" class="mb-4">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-0 shadow-sm" placeholder="Cari berdasarkan nama..." value="{{ request('search') }}" style="border-radius: 0 10px 10px 0;">
                            <button class="btn btn-primary ms-2 px-4" type="submit" style="border-radius: 10px;">
                                <i class="fas fa-search me-2"></i>Cari
                            </button>
                        </div>
                    </form>

                    <!-- Tombol Aksi (Kembali ke Dashboard dan Tambah) -->
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                        </a>
                        <a href="{{ route('pembeli.create') }}" class="btn btn-success btn-lg px-4 py-2 shadow-sm" style="border-radius: 15px; transition: all 0.3s ease;">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Pembeli
                        </a>
                    </div>

                    <!-- Tabel -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            <thead class="table-dark" style="background: linear-gradient(90deg, #495057 0%, #6c757d 100%);">
                                <tr>
                                    <th class="py-3"><i class="fas fa-hashtag me-2"></i>ID</th>
                                    <th class="py-3"><i class="fas fa-user me-2"></i>Nama</th>
                                    <th class="py-3"><i class="fas fa-phone me-2"></i>Telepon</th>
                                    <th class="py-3"><i class="fas fa-map-marker-alt me-2"></i>Alamat</th>
                                    <th class="py-3 text-center"><i class="fas fa-cogs me-2"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pembeli as $item)
                                <tr style="transition: background-color 0.3s ease;">
                                    <td class="fw-bold">{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('pembeli.show', $item) }}" class="btn btn-outline-info btn-sm me-1" title="Lihat" style="border-radius: 8px;">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('pembeli.edit', $item) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit" style="border-radius: 8px;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('pembeli.destroy', $item) }}" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus pembeli ini?')" style="border-radius: 8px;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <p>Tidak ada data pembeli ditemukan.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination (Bootstrap 5, Tengah & Bersih) -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $pembeli->appends(request()->query())->links('pagination::bootstrap-5') }}
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
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }
    .btn-group .btn {
        transition: all 0.2s ease;
    }
    .btn-group .btn:hover {
        transform: scale(1.1);
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    /* Styling pagination biar lebih manis */
    .pagination {
        margin: 0;
    }
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    }
    .pagination .page-link {
        border-radius: 8px;
        color: #667eea;
        border: 1px solid #dee2e6;
        transition: all 0.2s ease;
    }
    .pagination .page-link:hover {
        background-color: #f1f3ff;
    }
</style>
@endsection