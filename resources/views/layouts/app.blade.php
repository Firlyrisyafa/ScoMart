<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="icon" href="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746363922/channels4_profile-removebg-preview_bmk89f.png" type="image/png">


    {{-- Hapus asset() dan @vite karena tidak dibuild di Railway --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    {{-- Bootstrap & SweetAlert CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">

    <div class="min-h-screen">
        {{-- Navbar --}}
        @include('layouts.navigation')

        {{-- Header --}}
        @hasSection('header')
            <header class="container mt-4 bg-white rounded-md shadow">
                <div class="max-w-7xl mx-auto py-6">
                    @yield('header')
                </div>
            </header>
        @endif

        {{-- Main content --}}
        <main class="container mt-4">
            @yield('content')
        </main>
    </div>

    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>