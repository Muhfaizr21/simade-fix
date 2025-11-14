@extends('layouts.main')

@section('content')

{{-- ======= HEADER MODERN ======= --}}
<header class="py-5 mb-4" style="
    background: linear-gradient(135deg, #1a73e8, #4dabf7);
    color: white;
">
    <div class="container text-center">
        <h2 class="fw-bold mb-1">UMKM Desa</h2>
        <p class="mb-0">Temukan produk-produk unggulan desa dengan kualitas terbaik</p>
    </div>
</header>

<section class="counts section-bg">
    <div class="container">

        <div class="row g-3"> {{-- GRID LEBIH RAPAT --}}
            @foreach ($umkms as $umkm)
                <div class="col-lg-3 col-md-4 col-sm-6"> {{-- KAYAK MARKETPLACE --}}
                    <div class="card border-0 shadow-sm h-100 product-card" style="overflow: hidden;">

                        {{-- Foto Produk --}}
                        <img src="{{ asset('storage/' . $umkm->foto) }}"
                             class="card-img-top"
                             alt="Foto UMKM"
                             style="height: 220px; object-fit: cover;">

                        <div class="card-body p-3">

                            {{-- Nama Produk --}}
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 15px;">
                                {{ $umkm->produk }}
                            </h6>

                            {{-- Harga --}}
                            <p class="text-danger fw-bold mb-2" style="font-size: 16px;">
                                Rp {{ number_format($umkm->harga, 0, ',', '.') }}
                            </p>

                        </div>

                        {{-- Tombol --}}
                        <div class="px-3 pb-3 d-grid gap-2">
                            <a class="btn btn-success btn-sm"
                               href="https://wa.me/+62{{ $umkm->no_hp }}">
                                <i class="bi bi-whatsapp"></i> Chat Penjual
                            </a>

                            <a class="btn btn-warning btn-sm"
                               href="/umkm/{{ $umkm->slug }}">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="my-4 text-center">
            {{ $umkms->links() }}
        </div>

    </div>
</section>

{{-- ===== STYLE TAMBAHAN MARKETPLACE ===== --}}
<style>
    .product-card:hover {
        transform: translateY(-4px);
        transition: 0.2s;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>

@endsection
