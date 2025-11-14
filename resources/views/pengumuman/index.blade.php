@extends('layouts.main')

@section('content')

{{-- HERO SECTION --}}
<section
    class="w-full py-20 text-white mb-5"
    style="
        background: linear-gradient(135deg, #4f46e5, #10b981);
        padding-top: 5rem;
        padding-bottom: 5rem;
    "
>
    <div class="container text-center">
        <h1 class="fw-bold display-5 mb-2">Pengumuman</h1>
        <p class="opacity-75 fs-5">Informasi resmi terbaru dari desa</p>
    </div>
</section>


{{-- CONTENT SECTION --}}
<section class="py-3" style="background:#f9fafb;">
    <div class="container">

        <div class="row">

            @foreach ($pengumumans as $pengumuman)
                <div class="col-md-4 mb-4">

                    <div
                        class="card h-100 border-0 shadow-sm rounded-4 p-3"
                        style="
                            transition: .25s ease;
                            cursor: pointer;
                            background: #ffffff;
                        "
                        onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 28px rgba(0,0,0,0.12)'"
                        onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'"
                    >

                        <div class="card-body">

                            {{-- Title --}}
                            <h5 class="card-title fw-semibold fs-5" style="color:#111827;">
                                {{ $pengumuman->judul }}
                            </h5>

                            {{-- Timestamp --}}
                            <span class="text-muted small d-block mb-2">
                                <i class="bi bi-stopwatch-fill"></i>
                                {{ $pengumuman->created_at->diffForHumans() }}
                            </span>

                            {{-- Excerpt --}}
                            <p class="mt-2 text-secondary" style="font-size: .95rem;">
                                {!! $pengumuman->excerpt !!}
                            </p>

                            {{-- Read more --}}
                            <a
                                href="/pengumuman/{{ $pengumuman->slug }}"
                                class="fw-semibold"
                                style="color:#4f46e5; text-decoration:none;"
                            >
                                Selengkapnya →
                            </a>

                        </div>
                    </div>

                </div>
            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="paginate my-4 text-center">
            <div
                class="d-inline-block rounded-3 p-2 bg-white shadow-sm"
                style="padding-left: 1.5rem; padding-right: 1.5rem;"
            >
                {{ $pengumumans->links() }}
            </div>
        </div>

    </div>
</section>

@endsection
