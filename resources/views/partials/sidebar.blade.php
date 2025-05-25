<!-- Sidebar -->
 
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('images/smk.png') }}" alt="Logo SMK" style="width: 150%; height: 150%; object-fit: contain; display: block;">
                </div>
                <div class="sidebar-brand-text mx-3">Form pengaduan siswa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar pengaduan</span></a>
            </li>

            <!-- Divider -->
@role('admin')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">ROLE PERMISSION</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
        aria-expanded="true" aria-controls="collapseAdmin">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Admin Page</span>
        </a>    
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.rolemanagement') }}">Manajemen User</a>
                <a class="collapse-item" href="{{ route('admin.create') }}">Tambah Data</a>
            </div>
        </div>
    </li>
@endrole

@hasanyrole('admin|penulis')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOperator"
        aria-expanded="true" aria-controls="collapseOperator">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Operator Page</span>
        </a>    
        <div id="collapseOperator" class="collapse" aria-labelledby="headingOperator" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('operator.daftar') }}">Daftar Pengaduan</a>
            </div>
        </div>
    </li>
@endhasanyrole

    
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                form utama
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>user form</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                   

<a class="collapse-item" href="{{ route('pengaduan.tulisan') }}">Form Pengaduan</a>
                    </div>
                </div>
            </li>
         