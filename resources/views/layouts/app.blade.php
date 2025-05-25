<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Pengaduan Siswa')</title>
    
    <!-- SB Admin 2 Assets -->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    @yield('styles')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Content Wrapper -->
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('partials.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content') <!-- INI TEMPAT KONTEN UTAMA MUNCUL -->
                </div>
            </div>

            <!-- Footer -->
            @include('partials.footer')
        </div>
    

    <!-- Scripts -->
    <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>
    @yield('scripts')
</body>
</html>