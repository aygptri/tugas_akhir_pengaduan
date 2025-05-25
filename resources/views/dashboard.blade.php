@extends('layouts.app')

@section('title', 'Dashboard Pengaduan')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Pengaduan Siswa</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Pengaduan Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pengaduan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaduan Diproses Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pengaduan Diproses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaduan Terbaru</h6>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>No</th>
        <th>Judul Pengaduan</th>
        <th>Foto</th>
        <th>Status</th>
        <th>Detail</th>
                @if(auth()->user()->hasRole('admin'))

        <th>Hapus</th>
        @endif
        
    </tr>
</thead>
<tbody>
@foreach ($laporan as $no => $data)
    <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $data->judul }}</td>
        <td>             @if ($data->foto)
                <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Bukti" style="width: 80px; height: auto; border-radius: 5px;">
            @else
                <span class="text-muted">Tidak ada</span>
            @endif<td>
            @php
                $statusClass = [
                    'dikirim' => 'badge-secondary',
                    'diterima' => 'badge-primary',
                    'diproses' => 'badge-warning',
                    'selesai'  => 'badge-success',
                    'ditolak'  => 'badge-danger',
                ];
            @endphp
            <span class="badge {{ $statusClass[$data->status] ?? 'badge-secondary' }}">
                {{ ucfirst($data->status) }}
            </span>
        <td>

            <a href="{{ route('detail', $data->id) }}" class="btn btn-sm btn-info">Detail</a> 
        </td>
        @if(auth()->user()->hasRole('admin'))
        <td>
            <form onsubmit="return confirm('Yakin mau hapus user ini?')" class="d-inline" action="{{ route('pengaduan.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
        </td>
@endif
            </form>
        
    </tr>
@endforeach

</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
