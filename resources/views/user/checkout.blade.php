@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Checkout</h2>

    <div class="card p-4 mt-3">
        <h5>Rincian Pembelian</h5>
        <ul class="list-group mb-3">
            @php $total = 0; @endphp
            @foreach ($carts as $cart)
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        {{ $cart->product->name }} (x{{ $cart->jumlah }})
                    </div>
                    <span>Rp{{ number_format($cart->product->price * $cart->jumlah, 0, ',', '.') }}</span>
                </li>
                @php $total += $cart->product->price * $cart->jumlah; @endphp
            @endforeach
            <li class="list-group-item d-flex justify-content-between fw-bold">
                Total:
                <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
            </li>
        </ul>

        <div class="mb-4">
    <p class="text-muted text-center">Transfer ke nomor rekening yang tersedia sesuai dengan aplikasi elektronik payment yang kamu pilih jika kamu memilih metode pembayaran secara online</p>
    <div class="row text-center">
    <div class="col-md-3">
        <img src="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746072669/bca_pyo49e.png" alt="BCA" class="img-fluid mb-2 mx-auto d-block" style="height: 80px;">
        <div><strong>1537834294692</strong></div>
        <div class="text-danger">Firly Risyafa</div>
    </div>
    <div class="col-md-3">
        <img src="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746074154/bni_mlyvhe.png" alt="BNI" class="img-fluid mb-2 mx-auto d-block" style="height: 80px;">
        <div><strong>1542859236026</strong></div>
        <div class="text-danger">Firly Risyafa</div>
    </div>
    <div class="col-md-3">
        <img src="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746074131/bri_istnpu.png" alt="BRI" class="img-fluid mb-2 mx-auto d-block" style="height: 80px;">
        <div><strong>1524705737953</strong></div>
        <div class="text-danger">Firly Risyafa</div>
    </div>
    <div class="col-md-3">
        <img src="https://res.cloudinary.com/dzdws6q7q/image/upload/v1746074175/mandiri_ajzo30.png" alt="Mandiri" class="img-fluid mb-2 mx-auto d-block" style="height: 80px;">
        <div><strong>15930573020460</strong></div>
        <div class="text-danger">Firly Risyafa</div>
    </div>
</div>

</div>
        <p class="text-muted text-center">Jika sudah melakukan pembayaran, silahkan upload bukti pembayaran di bawah ini</p>

        <form action="{{ route('checkout.store') }}" method="POST" >
            @csrf

            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" onchange="toggleBukti()" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="manual">Online (Kirim Bukti Transfer ke WA)</option>
                    <option value="online">Offline</option>
                </select>
            </div>

            <div class="alert alert-info mt-3">
                Jika memilih pembayaran secara offline, maka silahkan anak anda membawa uang tunai dan datang ke koperasi sesuai urutan kelas yang dipanggil.
            </div>

            @php
                $nomorWa = '62881036600912'; // Ganti ke nomor kamu
                $pesanBukti = "Halo! Saya ingin mengirimkan bukti transfer untuk pesanan Sco-Mart. Nama pengguna saya: ";
                $waLinkBukti = "https://wa.me/$nomorWa?text=" . urlencode($pesanBukti);
            @endphp
            

            <div class="mb-3" id="bukti_container" style="display: none;">
                <p class="form-text text-muted">
                    Silakan <a href="{{ $waLinkBukti }}" target="_blank" class="text-success fw-bold">kirim bukti transfer ke WhatsApp ini</a> beserta nama pengguna kamu.
                </p>
            </div>

            <button type="submit" class="btn btn-success">Checkout Sekarang</button>
        </form>
    </div>

</div>
<script>
    function toggleBukti() {
        const metode = document.getElementById('metode_pembayaran').value;
        console.log(metode);
        const container = document.getElementById('bukti_container');
        if (metode === 'manual') {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    }
</script>
@endsection
