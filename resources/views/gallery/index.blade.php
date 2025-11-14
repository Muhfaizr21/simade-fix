@extends('layouts.main')

@section('content')

{{-- HEADER / HERO --}}
<section
    class="w-100 mb-5 d-flex align-items-center"
    style="
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        padding: 70px 0;
        color: white;
    "
>
    <div class="container text-center">
        <h1 class="fw-bold" style="font-size: 3rem;">Gallery Desa</h1>
        <p class="mt-2" style="font-size: 1.1rem; opacity: .85;">
            Dokumentasi visual kegiatan, acara, dan momen penting desa
        </p>
    </div>
</section>


<section class="counts section-bg py-5">

    <div class="container">
        <div class="row g-4">

            @foreach ($galerrys as $gallery)
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
                        style="transition: .3s; cursor:pointer;"
                        onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.15)'"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'"
                    >

                        <img src="{{ asset('storage/' . $gallery->gambar) }}"
                             class="card-img-top"
                             alt="Gallery"
                             style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <p class="text-muted mb-0" style="font-size: 0.92rem;">
                                {{ $gallery->keterangan }}
                            </p>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

        {{-- Pagination --}}
        <div class="paginate my-4 text-center">
            <div class="d-inline-block p-2 bg-white shadow-sm rounded-4">
                {{ $galerrys->links() }}
            </div>
        </div>

    </div>
</section>

@endsection
