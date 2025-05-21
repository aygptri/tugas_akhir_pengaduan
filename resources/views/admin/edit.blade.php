@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        <a href="{{ route('admin.rolemanagement') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali ke Daftar
        </a>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengguna</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.update',$user->id) }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}" >
                        </div>
                    </div>
               
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{  $user->email}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password Baru (Opsional)</label>
                            <input type="password" class="form-control" id="password" placeholder="Kosongkan jika tidak diubah" 
                            value="{{  $user->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Harus sama dengan password">
                        </div>
                    </div>
                </div>

         {{-- <div class="form-group">
    <label for="roles">Role Pengguna</label>
    <div class="border p-3 rounded bg-light">

        <!-- Admin -->
        <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="role" id="role-admin" value="admin" {{ $user->hasRole('admin') ? 'checked' : '' }}>
            <label class="form-check-label font-weight-bold" for="role-admin">Admin</label>
        </div>

        <!-- Operator -->
        <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="role" id="role-operator" value="operator" {{ $user->hasRole('operator') ? 'checked' : '' }}>
            <label class="form-check-label font-weight-bold" for="role-operator">Operator</label>
        </div>

        <!-- Permission khusus operator -->
        <div class="pl-4 mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="perm-list-users" name="permissions[]" value="lihat-user" checked>
                <label class="custom-control-label" for="perm-list-users">Lihat User</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="perm-create-users" name="permissions[]" value="create-user" checked>
                <label class="custom-control-label" for="perm-create-users">Create User</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="perm-edit-users" name="permissions[]" value="edit-user" checked>
                <label class="custom-control-label" for="perm-edit-users">Edit User</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="perm-delete-users" name="permissions[]" value="delete-user">
                <label class="custom-control-label" for="perm-delete-users">Delete User</label>
            </div>
        </div>

        <!-- User (ini yang kamu minta masuk ke dalam) -->
        <div class="form-check mt-3">
            <input class="form-check-input" type="radio" name="role" id="role-user" value="user" {{ $user->hasRole('user') ? 'checked' : '' }}>
            <label class="form-check-label font-weight-bold" for="role-user">User</label>
        </div>

    </div>
</div> --}}


                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .custom-checkbox .custom-control-label::before {
        border-radius: .25rem;
    }
    .custom-control-label {
        user-select: none;
    }
    .card-body {
        padding: 2rem;
    }
</style>
@endsection