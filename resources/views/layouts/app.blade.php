<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Load Bootstrap compiled CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- Optional custom style --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    {{-- SweetAlert --}}
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

    {{-- Load Bootstrap compiled JS --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
