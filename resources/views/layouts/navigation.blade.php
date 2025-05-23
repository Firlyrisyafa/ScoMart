<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo atau Nama Aplikasi -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746369571/download__2_-removebg-preview_sdartt.png"
                alt="Logo Sekolah"
                style="height: 30px; margin-right: 8px;">
            <img src="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746363922/channels4_profile-removebg-preview_bmk89f.png"
                alt="Logo Sekolah"
                style="height: 30px; margin-right: 8px;">
            {{ config('app.name', 'Laravel') }}
        </a>


        <!-- Tombol menu untuk tampilan mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Menu Home -->
                @auth
                    @php
                        $totalItems = \App\Models\Cart::where('user_id', auth()->id())->sum('jumlah');
                    @endphp

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            🛒 Keranjang
                            @if($totalItems > 0)
                                <span class="badge bg-danger">{{ $totalItems }}</span>
                            @endif
                        </a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/katalog') }}">Katalog</a>
                </li>
                <!-- Menu Contact -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/riwayat') }}">Riwayat</a>
                </li>

                <!-- Login / Logout (Conditional) -->
                @auth
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>

                <!-- Form Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif
