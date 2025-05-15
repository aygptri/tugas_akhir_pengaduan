<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaduan Siswa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #4e73df; /* Warna biru SB Admin */
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 30px;
        }

        .logo {
            max-width: 120px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #ffffff;
            color: #4e73df;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e2e6ea;
            color: #4e73df;
        }

        .btn-outline-light {
            color: #ffffff;
            border-color: #ffffff;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: #4e73df;
        }

        footer {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px 0;
            text-align: center;
            font-size: 14px;
            color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="main-content">
        <div>
            <img src="{{ asset('logo.png') }}" alt="Logo" class="logo"> {{-- Ganti dengan logo kamu --}}
            <h1 class="mb-3 fw-bold">Selamat Datang</h1>
            <p class="mb-4">Ini adalah website pengaduan siswa. Silakan login terlebih dahulu untuk melanjutkan.</p>

            @if (Route::has('login'))
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} Website Pengaduan Siswa. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
