<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Load TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Load Inter font from Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body, input, button, select, textarea {
            font-family: 'Inter', sans-serif;
        }

        .bg-cover-custom {
            background-image: url('{{ asset('images/bg.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="relative min-h-screen bg-cover-custom overflow-hidden flex flex-col justify-between">

    <!-- Layer biru transparan -->
    <div class="absolute inset-0 bg-blue-800 opacity-60 z-0"></div>

    <!-- Konten -->
    <main class="relative z-10 flex-grow flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md bg-white bg-opacity-90 rounded-lg shadow-lg p-6 text-center">
            <!-- Logo -->
            <div class="mb-6">
                <img src="{{ asset('images/smk.png') }}" alt="Logo Sekolah" class="w-24 mx-auto">
            </div>

            <!-- Form Login/Register -->
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 w-full bg-white text-black text-center text-sm py-3 mt-8">
    <div class="container mx-auto">
        <span>&copy; {{ date('Y') }} Website Pengaduan Siswa. All rights reserved.</span>
    </div>
</footer>

</body>
</html>
