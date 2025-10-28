@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: linear-gradient(135deg, #e0f7fa 0%, #e3f2fd 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
                <div class="card-header text-white text-center" 
                     style="background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 20px 20px 0 0;">
                    <h2 class="mb-0 fw-bold">Edit Data Pembeli</h2>
                </div>
                <div class="card-body px-5 py-4">
                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pembeli.update', $pembeli) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama Pembeli</label>
                            <input type="text" id="nama" name="nama" 
                                   class="form-control form-control-lg shadow-sm"
                                   value="{{ old('nama', $pembeli->nama) }}" required
                                   style="border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-semibold">Nomor Telepon</label>
                            <input type="text" id="telepon" name="telepon" 
                                   class="form-control form-control-lg shadow-sm"
                                   value="{{ old('telepon', $pembeli->telepon) }}" required
                                   style="border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" rows="4"
                                      class="form-control form-control-lg shadow-sm"
                                      style="border-radius: 10px;" required>{{ old('alamat', $pembeli->alamat) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('pembeli.index') }}" 
                               class="btn btn-outline-secondary px-4 py-2 shadow-sm" 
                               style="border-radius: 10px;">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success px-4 py-2 shadow-sm" 
                                    style="border-radius: 10px;">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
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
        transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #00c6ff;
        box-shadow: 0 0 0 0.25rem rgba(0, 198, 255, 0.25);
    }
</style>
@endsection

