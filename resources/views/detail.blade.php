{{-- @extends('layouts.app')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card detail-card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Detail Pengaduan</h4>
                </div>
                <div class="card-body">
                    <!-- Badge Status -->
                    <div class="mb-4 text-end">
                        @php
                            $status_class = '';
                            if ($pengaduan['status'] == 'diterima') {
                                $status_class = 'status-diterima';
                            } elseif ($pengaduan['status'] == 'diproses') {
                                $status_class = 'status-diproses';
                            } elseif ($pengaduan['status'] == 'selesai') {
                                $status_class = 'status-selesai';
                            }
                        @endphp
                        <span class="status-badge {{ $status_class }}">
                            {{ strtoupper($pengaduan['status']) }}
                        </span>
                    </div>

                    <!-- Informasi Pengaduan -->
                    <h3 class="card-title mb-3">{{ $pengaduan['judul'] }}</h3>
                    
                    <div class="mb-4">
                        <p class="text-muted mb-1">Diajukan oleh:</p>
                        <h5>{{ $pengaduan['siswa']['nama'] }}</h5>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-muted mb-1">Tanggal Pengaduan:</p>
                        <h5>{{ \Carbon\Carbon::parse($pengaduan['tanggal'])->format('d F Y H:i') }}</h5>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-muted mb-1">Kategori:</p>
                        <h5>{{ $pengaduan['kategori'] }}</h5>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-muted mb-1">Deskripsi Pengaduan:</p>
                        <div class="p-3 bg-light rounded">
                            {!! nl2br(e($pengaduan['deskripsi'])) !!}
                        </div>
                    </div>
                    
                    @if(!empty($pengaduan['lampiran']))
                    <div class="mb-4">
                        <p class="text-muted mb-1">Lampiran:</p>
                        <a href="{{ asset('storage/' . $pengaduan['lampiran']) }}" 
                           class="btn btn-outline-primary" 
                           target="_blank">
                            Lihat Lampiran
                        </a>
                    </div>
                    @endif
                    
                    <!-- Timeline Proses -->
                    <div class="mb-4">
                        <p class="text-muted mb-3">Timeline Proses:</p>
                        <div class="timeline">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Pengaduan Diterima</h6>
                                    <p class="text-muted mb-0">
                                        {{ \Carbon\Carbon::parse($pengaduan['tanggal'])->format('d F Y H:i') }}
                                    </p>
                                </div>
                            </div>
                            
                            @if($pengaduan['status'] == 'diproses' || $pengaduan['status'] == 'selesai')
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bi bi-arrow-repeat text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Pengaduan Diproses</h6>
                                    <p class="text-muted mb-0">
                                        {{ \Carbon\Carbon::parse($pengaduan['tanggal_diproses'])->format('d F Y H:i') }}
                                    </p>
                                    @if(!empty($pengaduan['catatan_proses']))
                                    <p class="mt-2">
                                        <strong>Catatan:</strong> {{ $pengaduan['catatan_proses'] }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            @endif
                            
                            @if($pengaduan['status'] == 'selesai')
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Pengaduan Selesai</h6>
                                    <p class="text-muted mb-0">
                                        {{ \Carbon\Carbon::parse($pengaduan['tanggal_selesai'])->format('d F Y H:i') }}
                                    </p>
                                    @if(!empty($pengaduan['solusi']))
                                    <p class="mt-2">
                                        <strong>Solusi:</strong> {{ $pengaduan['solusi'] }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="card-footer text-end">
                    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">
                        Kembali ke Daftar Pengaduan
                    </a>
                    
                    <!-- Tombol aksi untuk admin -->
                    @auth
                        @if(auth()->user()->role == 'admin')
                            @if($pengaduan['status'] == 'diterima')
                                <a href="{{ route('pengaduan.proses', $pengaduan['id']) }}" class="btn btn-primary">
                                    Proses Pengaduan
                                </a>
                            @elseif($pengaduan['status'] == 'diproses')
                                <a href="{{ route('pengaduan.selesaikan', $pengaduan['id']) }}" class="btn btn-success">
                                    Selesaikan Pengaduan
                                </a>
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .status-badge {
        padding: 8px 12px;
        border-radius: 20px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 0.8rem;
    }
    .status-diterima {
        background-color: #ffc107;
        color: #000;
    }
    .status-diproses {
        background-color: #0d6efd;
        color: #fff;
    }
    .status-selesai {
        background-color: #198754;
        color: #fff;
    }
    .detail-card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>
@endsection --}}