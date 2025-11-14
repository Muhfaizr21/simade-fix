@extends('layouts.main')

@section('content')

<section class="py-5" style="background:#f3f4f6;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-9">

                {{-- CARD WRAPPER --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-md-5">

                        {{-- Breadcrumb --}}
                        <div class="mb-4">
                            <small class="text-muted">
                                <a href="/pengumuman" class="text-decoration-none" style="color:#4f46e5;">
                                    Pengumuman
                                </a>
                                <span class="mx-1">/</span>
                                <span>{{ $pengumuman->judul }}</span>
                            </small>
                        </div>

                        {{-- TITLE --}}
                        <h1 class="fw-bold mb-3" style="color:#1f2937; font-size:2rem;">
                            {{ $pengumuman->judul }}
                        </h1>

                        {{-- Meta --}}
                        <div class="d-flex flex-wrap mb-4" style="color:#6b7280; font-size: .9rem;">

                            <div class="me-3 mb-2">
                                <i class="bi bi-clock"></i>
                                {{ $pengumuman->created_at->diffForHumans() }}
                            </div>

                            <div class="me-3 mb-2">
                                <i class="bi bi-person-circle"></i>
                                {{ $pengumuman->user->name }}
                            </div>

                            <div class="mb-2">
                                <i class="bi bi-eye"></i>
                                Dibaca {{ $pengumuman->views }} kali
                            </div>

                        </div>

                        <hr class="my-4">

                        {{-- CONTENT --}}
                        <div class="article-body" style="color:#374151; font-size:1.08rem; line-height:1.8;">
                            {!! $pengumuman->isi_pengumuman !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
