<!-- Sidebar -->
 
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('images/smk.png') }}" alt="Logo SMK" style="width: 150%; height: 150%; object-fit: contain; display: block;">
                </div>
                <div class="sidebar-brand-text mx-3">Form pengaduan siswa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar pengaduan</span></a>
            </li>

            <!-- Divider -->
            @if (auth()->user()->hasRole('admin'))
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                ROlE PERMISION
            </div>


            <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                 aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>kuasa admin</span>
                </a>    
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="rolemanagement">Manajemen user</a>
                        <a class="collapse-item" href="{{ route('admin.create') }}">tambah data</a>
                        <a class="collapse-item" href="edit">edit hak akses role</a>
                     
                        
                    </div>
                </div>
            </li>
            @endif
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
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                   

                        <a class="collapse-item" href="tulisan">form pengaduan</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="detail">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Detail </span></a>
            </li>
