@extends('layouts.main')

@section('content')

{{-- Hero Section --}}
<section
    class="w-full py-20 text-white"
    style="background: linear-gradient(135deg, #4f46e5, #10b981);"
>
    <div class="container text-center">
        <h1 class="fw-bold display-5 mb-2">
            {{ e($petaDesa->judul) }}
        </h1>
        <p class="opacity-75">
            Lokasi: {{ e($petaDesa->alamat) }}
        </p>
    </div>
</section>

{{-- Content Section --}}
<section class="py-5" style="background:#f9fafb;">
    <div class="container d-flex justify-content-center">
        <div class="col-lg-10">

            {{-- Card Container --}}
            <div
                class="p-4 p-md-5 bg-white rounded-4 shadow-sm"
                style="border: 1px solid #e5e7eb;"
            >

                {{-- Map Title --}}
                <h3 class="mb-4 fw-semibold" style="color:#374151;">
                    📍 Peta Lokasi Desa
                </h3>

                {{-- Responsive Map --}}
                <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                    <iframe
                        src="https://maps.google.com/maps?hl=en&amp;q={{ urlencode($petaDesa->alamat) }}&amp;t=h&amp;z=13&amp;iwloc=B&amp;output=embed"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        style="border:0;"
                    ></iframe>
                </div>

                {{-- Footer Note --}}
                <p class="mt-3 text-muted small">
                    Data lokasi otomatis berdasarkan alamat desa.
                </p>

            </div>
        </div>
    </div>
</section>

@endsection
