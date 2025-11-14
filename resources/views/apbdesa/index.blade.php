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
        <h1 class="fw-bold" style="font-size: 2.8rem;">Anggaran Desa / APBDES</h1>
        <p class="mt-2" style="opacity:.85; font-size:1.05rem;">
            Transparansi realisasi anggaran desa untuk masyarakat
        </p>
    </div>
</section>



<section class="counts section-bg py-4">
    <div class="container">

        <div class="row g-4">

            @foreach ($anggarans as $anggaran)
                <div class="col-lg-4 col-md-6">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
                        style="transition: .25s;"
                        onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.15)'"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'"
                    >

                        <img src="{{ asset('storage/' . $anggaran->gambar) }}"
                             alt="gambar anggaran"
                             class="card-img-top"
                             style="height: 220px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="fw-bold mb-3" style="font-size:1.1rem;">
                                {{ $anggaran->judul }}
                            </h5>
                        </div>

                        <div class="p-3 pt-0">
                            <a class="btn btn-primary w-100 rounded-3"
                               href="/apbdesa/{{ $anggaran->slug }}">
                                <i class="bi bi-eye"></i> &nbsp; Selengkapnya
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>


        {{-- Pagination --}}
        <div class="paginate my-4 text-center">
            <div class="d-inline-block bg-white p-2 shadow-sm rounded-4">
                {{ $anggarans->links() }}
            </div>
        </div>

    </div>
</section>

@endsection
