@extends('layouts.app')

@section('title', 'Form Pengaduan Baru')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pengaduan Baru</h1>
    </div>

    <!-- Form Pengaduan -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Silahkan isi form pengaduan</h6>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="judul">Judul Pengaduan</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" 
                                    id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Fasilitas">Fasilitas Sekolah</option>
                                <option value="Guru">Guru/Pengajar</option>
                                <option value="Administrasi">Administrasi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Lengkap</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="lampiran">Lampiran (Opsional)</label>
                            <input type="file" class="form-control-file @error('lampiran') is-invalid @enderror" 
                                   id="lampiran" name="lampiran">
                            <small class="form-text text-muted">
                                Format: JPG, PNG, PDF (Maks. 2MB)
                            </small>
                            @error('lampiran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Kirim Pengaduan
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Petunjuk Pengisian -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Petunjuk Pengisian</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Isi judul dengan singkat dan jelas</li>
                        <li>Deskripsi harus detail tentang masalah yang diadukan</li>
                        <li>Lampiran bisa berupa foto atau dokumen pendukung</li>
                        <li>Pengaduan akan diproses dalam 1-3 hari kerja</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('scripts')
<script>
    // Validasi form sebelum submit
    document.querySelector('form').addEventListener('submit', function(e) {
        if(!confirm('Apakah Anda yakin ingin mengirim pengaduan ini?')) {
            e.preventDefault();
        }
    });
</script>
@endsection