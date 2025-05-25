@extends('layouts.app')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail Pengaduan</h5>
                </div>
                 
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">judul</div>
                        <div class="col-md-8">{{ $laporan->judul }}</div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Detail Laporan:</div>
                        <div class="col-md-8">{{ $laporan->isi }}</div>
                    </div>

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

<div class="row mb-3">
    <div class="col-md-4 fw-bold">Status:</div>
    <div class="col-md-8">
        <span class="badge {{ $class }} text-white">
    {{ ucfirst($laporan->status) }}
</span>

    </div>
</div>


<div class="row mb-3 mt-4">
    <div class="col-md-4 fw-bold">Bukti Foto:</div>
    <div class="col-md-8">
        @if ($laporan->foto)
            <div class="d-flex flex-column align-items-start">
                <img src="{{ asset('storage/' . $laporan->foto) }}" 
                     alt="Bukti Foto" 
                     class="img-thumbnail mb-2" 
                     style="max-width: 100%; height: auto; max-height: 400px;">
            </div>
        @else
            <span class="text-muted">Tidak ada foto bukti</span>
        @endif
    </div>
</div>



                <div class="card-footer">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
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
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    
    .img-thumbnail {
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }
</style>
@endsection