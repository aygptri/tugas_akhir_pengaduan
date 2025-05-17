@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        <a href="rolemanagement" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengguna</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" value="Admin Utama" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="admin@sekolah.sch.id" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password Baru (Opsional)</label>
                            <input type="password" class="form-control" id="password" placeholder="Kosongkan jika tidak diubah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Harus sama dengan password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="roles">Role Pengguna</label>
                    <div class="border p-3 rounded bg-light">
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="role-admin" checked>
                            <label class="custom-control-label font-weight-bold" for="role-admin">Admin</label>
                            <div class="pl-4 mt-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm-list-users" checked>
                                    <label class="custom-control-label" for="perm-list-users">List Users</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm-create-users" checked>
                                    <label class="custom-control-label" for="perm-create-users">Create Users</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm-edit-users" checked>
                                    <label class="custom-control-label" for="perm-edit-users">Edit Users</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm-delete-users">
                                    <label class="custom-control-label" for="perm-delete-users">Delete Users</label>
                                </div>
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="role-operator">
                            <label class="custom-control-label font-weight-bold" for="role-operator">Operator</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="role-teacher">
                            <label class="custom-control-label font-weight-bold" for="role-teacher">Guru</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo mr-2"></i>Reset
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