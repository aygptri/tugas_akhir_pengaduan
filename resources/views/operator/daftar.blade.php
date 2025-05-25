@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaduan Terbaru</h6>
            </div>

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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $no => $data)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>
                                        @if ($data->foto)
                                            <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Bukti" style="width: 80px; height: auto; border-radius: 5px;">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                         <td>
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
                                            </td>
                                        <td>
                                            <a href="{{ route('detail', $data->id) }}" class="btn btn-sm btn-info mb-1">Detail</a>
                                        </td>
                                    </td>
                                    <td>
@role('admin')
                                        <form action="{{ route('pengaduan.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus laporan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger mb-1" type="submit">Hapus</button>
                                        </form>
@endrole
                                        <!-- Update Status -->
                                        <form action="{{ route('operator.status.update', $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <select name="status" class="form-control form-control-sm d-inline w-auto" onchange="this.form.submit()">
                                                <option disabled selected>Ubah Status</option>
                                                <option value="diterima">Diterima</option>
                                                <option value="diproses">Diproses</option>
                                                <option value="selesai">Selesai</option>
                                                <option value="ditolak">Ditolak</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
