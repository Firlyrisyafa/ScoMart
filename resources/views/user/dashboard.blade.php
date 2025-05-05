@extends('layouts.app')

@section('title', 'User Dashboard')

@section('header')
    <div class="container mt-4 text-center">
        <h2 class="display-6 fw-semibold">Dashboard User</h2>
    </div>
@endsection

@section('content')
    <div class="container py-5">
        <!-- Sambutan -->
        <div class="mb-4 text-center">
            <p class="fs-4 fw-medium text-dark">
                Selamat datang di dashboard user, {{ Auth::user()->name }}!
            </p>
        </div>

        <!-- Section Gambar Sco-Mart -->
        <div class="row align-items-center bg-light p-5 rounded shadow-sm">
            <!-- Keterangan teks -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h1 class="fw-bold display-5 text-primary">SELAMAT DATANG</h1>
                <h1 class="fst-italic fw-semibold text-dark mb-3">Di Website <span class="text-success">Sco-Mart</span></h1>

                <p class="fs-5 text-secondary">
                    Website ini hadir sebagai sarana informasi dan komunikasi yang memudahkan seluruh anggota koperasi
                    dalam mengakses berbagai layanan dan informasi terbaru mulai dari informasi produk yang tersedia
                    yang sesuai dengan dunia pendidikan.
                </p>
            </div>

            <!-- Gambar -->
            <div class="col-md-6 text-center">
                <img src="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746106484/koperasi-ilustrasi_nygdlf.png"
                     alt="Sco-Mart Welcome" class="img-fluid rounded shadow-lg" style="max-height: 350px;">
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container mt-5">
        <p class="text-center text-muted small">&copy; 2023 Sco-Mart. All rights reserved.</p>
    </div>
@endsection
