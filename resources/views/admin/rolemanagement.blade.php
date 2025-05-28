@extends('layouts.app')

@section('title', 'Proses Pelaporan')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen user</h1>

    </div>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
    </div>
@endif
    <!-- Tabel Laporan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar user</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" 
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th> 
    </tr>
</thead>
<tbody>
@foreach ($user as $no => $data)
    <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->email }}</td>
        <td>{{ $data->getRoleNames()->first() }}</td>
        <td>
            <a href="{{ route('admin.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>

            <form onsubmit="return confirm('Yakin mau hapus user ini?')" class="d-inline" action="{{ route('admin.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
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
@endsection
