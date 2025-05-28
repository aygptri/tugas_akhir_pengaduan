@extends('layouts.app')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail Pengaduan</h5>
                </div>
                 
                <div class="card-body">
                    <!-- Bagian Judul -->
<div class="row mb-3 align-items-center justify-content-between">
    <div class="col fw-bold">
        Judul: {{ $laporan->judul }}
    </div>
</div>
<hr>

<div class="row mb-3 align-items-center justify-content-between">
    @php
        $statusClass = [
            'dikirim' => 'bg-secondary',
            'diterima' => 'bg-primary',
            'diproses' => 'bg-warning',
            'selesai'  => 'bg-success',
            'ditolak'  => 'bg-danger',
        ];
        $class = $statusClass[$laporan->status] ?? 'bg-secondary';
        @endphp

<div class="col-md-4 fw-bold">
    <span class="badge {{ $class }} text-white">
       Status: {{ ucfirst($laporan->status) }}
    </span>
</div>
    

</div>
<hr>



                    <div class="row">
                        <div class="col-md-7 pe-4">
                            <div class="mb-3">
                                <h6 class="fw-bold border-bottom pb-2">Detail Laporan</h6>
                                <div class="p-3 bg-light rounded" 
                                    style="min-height: 150px; max-height: 300px; overflow-y: auto;">

                                    <p class="mb-0">{{ $laporan->isi }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
    <div class="mb-3">
        <h6 class="fw-bold border-bottom pb-2">Bukti Foto</h6>
        @if ($laporan->foto)
            @if(request()->has('showImage'))
                <div class="text-center">
                    <img src="{{ asset('storage/' . $laporan->foto) }}" 
                         class="img-fluid"
                         style="max-height: 1000vh;">
                    <div class="mt-3">
                        <a href="{{ url()->current() }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Detail
                        </a>
                    </div>
                </div>
            @else

                <div class="border p-2 rounded text-center" style="min-height: 150px;">
                    <img src="{{ asset('storage/' . $laporan->foto) }}" 
                         class="img-fluid rounded"
                         style="max-height: 300px;">
                    <div class="mt-2">
                        <a href="{{ url()->current() }}?showImage=1" 
                           class="btn btn-sm btn-outline-primary">
                            Lihat Full Size
                        </a>
                    </div>
                </div>
            @endif
        @else
            <div class="p-3 bg-light rounded text-center" style="min-height: 150px;">
                <span class="text-muted">Tidak ada foto bukti</span>
            </div>
        @endif
    </div>
</div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>

@endsection