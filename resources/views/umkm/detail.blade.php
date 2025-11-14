@extends('layouts.main')

@section('content')

{{-- ======= HEADER ======= --}}
<header class="py-4 mb-4" style="
    background: linear-gradient(135deg, #1a73e8, #4dabf7);
    color: white;">
    <div class="container text-center">
        <h2 class="fw-bold mb-0">Detail Produk</h2>
    </div>
</header>

<section class="counts section-bg">
    <div class="container">

        <div class="card shadow-sm border-0 p-4">
            <div class="row g-4 align-items-start">

                {{-- ======= FOTO PRODUK ======= --}}
                <div class="col-lg-4 text-center">
                    <div class="img-wrapper">
                        <img src="{{ asset('storage/' . $umkm->foto) }}"
                             alt="{{ $umkm->produk }}"
                             class="img-fluid rounded shadow-sm product-img">
                    </div>
                </div>

                {{-- ======= DETAIL PRODUK ======= --}}
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">{{ $umkm->produk }}</h2>

                    <h4 class="text-danger fw-bold mb-3">
                        Rp {{ number_format($umkm->harga, 0, ',', '.') }}
                    </h4>

                    <table class="table table-borderless mb-4">
                        <tbody>
                            <tr>
                                <td width="120"><strong>Deskripsi</strong></td>
                                <td width="10">:</td>
                                <td>{!! $umkm->deskripsi !!}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- TOMBOL --}}
                    <a href="https://wa.me/+62{{ $umkm->no_hp }}"
                       class="btn btn-success btn-lg px-4">
                        <i class="bi bi-whatsapp"></i> Hubungi Penjual
                    </a>

                </div>
            </div>
        </div>

    </div>
</section>

{{-- ===== CSS EXTRA MARKETPLACE ===== --}}
<style>
    .product-img {
        transition: 0.3s ease;
        height: 350px;
        object-fit: cover;
        width: 100%;
    }
    .product-img:hover {
        transform: scale(1.05);
    }
    .img-wrapper {
        overflow: hidden;
        border-radius: 10px;
    }
</style>

@endsection
