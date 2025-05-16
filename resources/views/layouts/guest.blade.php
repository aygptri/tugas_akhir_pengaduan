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
        /* Force Inter font for input, textarea, button, etc */
        body, input, button, select, textarea {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-blue-600 flex items-center justify-center font-sans">

    <div class="w-full max-w-md px-6 py-8 bg-white rounded-lg shadow-lg">
        {{ $slot }}
    </div>

</body>
</html>