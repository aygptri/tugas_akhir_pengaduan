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

@php
$isAdminActive = request()->routeIs('admin.rolemanagement') || request()->routeIs('admin.create');
@endphp
@role('admin')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">ROLE PERMISSION</div>
    <li class="nav-item {{ $isAdminActive ? 'active' : '' }}">
    <a class="nav-link {{ $isAdminActive ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
        data-target="#collapseAdmin"
        aria-expanded="{{ $isAdminActive ? 'true' : 'false' }}"
        aria-controls="collapseAdmin">

            <i class="fas fa-fw fa-wrench"></i>
            <span>Admin Page</span>
        </a>    
        <div id="collapseAdmin" class="collapse {{ $isAdminActive ? 'show' : '' }}" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('admin.rolemanagement') ? 'active' : '' }}" href="{{ route('admin.rolemanagement') }}">Manajemen User</a>
                <a class="collapse-item {{ request()->routeIs('admin.create') ? 'active' : '' }}" href="{{ route('admin.create') }}">Tambah Data</a>

            </div>
        </div>
    </li>
@endrole


@php
$isOperatorActive = request()->routeIs('operator.daftar');
@endphp

@hasanyrole('admin|penulis')
<li class="nav-item {{ $isOperatorActive ? 'active' : '' }}">
    <a class="nav-link {{ $isOperatorActive ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
        data-target="#collapseOperator"
        aria-expanded="{{ $isOperatorActive ? 'true' : 'false' }}"
        aria-controls="collapseOperator">

            <i class="fas fa-fw fa-wrench"></i>
            <span>Operator Page</span>
        </a>    
        <div id="collapseOperator" class="collapse {{ $isOperatorActive ? 'show' : '' }}" aria-labelledby="headingOperator" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <a class="collapse-item {{ $isOperatorActive ? 'active' : '' }}" href="{{ route('operator.daftar') }}">Daftar Pengaduan</a>
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
       @php
    // Cek apakah route aktif untuk submenu
    $isFormPengaduanActive = request()->routeIs('pengaduan.tulisan');
@endphp

<li class="nav-item">
    <a class="nav-link {{ $isFormPengaduanActive ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="{{ $isFormPengaduanActive ? 'true' : 'false' }}" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>user form</span>
    </a>

    <div id="collapsePages" class="collapse {{ $isFormPengaduanActive ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ $isFormPengaduanActive ? 'active' : '' }}" href="{{ route('pengaduan.tulisan') }}">
                Form Pengaduan
            </a>
        </div>
    </div>
</li>

         