@extends('layouts.main')

@section('content')

{{-- HERO HEADER --}}
<section class="w-100 py-5 mb-4 text-white"
    style="
        background: linear-gradient(135deg, #4f46e5, #10b981);
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    ">
    <div class="container text-center">
        <h1 class="fw-bold display-5 mb-2">Berita Desa</h1>
        <p class="opacity-75 mb-0" style="font-size:1.1rem;">
            Update terbaru, langsung dari desa — cepat, jelas, informatif.
        </p>
    </div>
</section>


<section class="py-4" style="background:#f3f4f6;">
    <div class="container">

        <div class="row">

            @foreach ($beritas as $berita)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">

                    {{-- CARD --}}
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
                        style="transition: .25s; cursor:pointer;"
                        onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 28px rgba(0,0,0,0.14)'"
                        onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'"
                    >

                        {{-- IMAGE --}}
                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                             alt="Gambar Berita"
                             class="card-img-top"
                             style="height: 210px; object-fit: cover;">

                        {{-- BODY --}}
                        <div class="card-body">

                            <h5 class="fw-bold mb-1" style="color:#111827;">
                                {{ $berita->judul }}
                            </h5>

                            <div class="text-muted small mb-2">
                                <i class="bi bi-clock"></i>
                                {{ $berita->created_at->diffForHumans() }}
                            </div>

                            <p class="text-secondary" style="font-size:.96rem;">
                                {{ $berita->excerpt }}
                            </p>

                        </div>

                        {{-- FOOTER --}}
                        <div class="card-footer bg-white border-0 px-3 pb-3">
                            <a href="/berita/{{ $berita->slug }}"
                               class="fw-semibold"
                               style="color:#4f46e5; text-decoration:none;">
                                Selengkapnya →
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="mt-4 text-center">
            <div class="bg-white rounded-3 shadow-sm d-inline-block p-2">
                {{ $beritas->links() }}
            </div>
        </div>

    </div>
</section>

@endsection
