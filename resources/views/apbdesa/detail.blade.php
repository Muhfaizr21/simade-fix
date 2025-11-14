@extends('layouts.main')

@section('content')

{{-- HERO HEADER --}}
<section
    class="w-100 d-flex align-items-center mb-5"
    style="
        background: linear-gradient(135deg, #0f172a, #1e3a8a, #3b82f6);
        padding: 70px 0;
        color: #fff;
    "
>
    <div class="container text-center">
        <h1 class="fw-bold" style="font-size: 2.5rem;">
            {{ $anggaran->judul }}
        </h1>
        <p class="mt-3" style="opacity:.85;">
            Transparansi Anggaran Desa — Informasi Resmi
        </p>
    </div>
</section>



<section class="counts section-bg">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <article class="card border-0 shadow-sm rounded-4 p-4">

                    {{-- Breadcrumb --}}
                    <nav style="font-size: 0.95rem;">
                        <a href="/apbdesa" class="text-decoration-none">Anggaran</a>
                        <span class="mx-2">›</span>
                        <span class="text-muted">{{ $anggaran->judul }}</span>
                    </nav>

                    {{-- Meta --}}
                    <div class="mt-3 mb-4 text-muted" style="font-size: 0.95rem;">
                        <i class="bi bi-person-circle"></i>
                        Diposting oleh <b>{{ $anggaran->user->name }}</b>
                    </div>

                    {{-- Image --}}
                    <div class="text-center mb-4">
                        <img
                            src="{{ asset('storage/' . $anggaran->gambar) }}"
                            alt="Gambar Andalan"
                            class="img-fluid rounded-3 shadow-sm"
                            style="max-height: 480px; width: 100%; object-fit: cover;"
                        >
                    </div>

                    {{-- Content --}}
                    <div class="mt-3" style="font-size: 1.1rem; line-height: 1.7;">
                        {!! $anggaran->keterangan !!}
                    </div>

                </article>

            </div>
        </div>

    </div>
</section>

@endsection
