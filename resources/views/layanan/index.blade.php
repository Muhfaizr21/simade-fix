@extends('layouts.main')

@section('content')

<style>
    /* Section background */
    .section-bg {
        background: #f8f9fa;
        padding: 60px 0;
    }

    /* Title */
    .section-title h2 {
        text-align: center;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 40px;
        color: #222;
    }

    /* Grid spacing */
    .service-grid .col-lg-4 {
        margin-bottom: 25px;
    }

    /* Card style marketplace */
    .service-card {
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.07);
        transition: 0.25s ease;
        padding: 0;
        overflow: hidden;
        border: 1px solid #eaeaea;
    }

    .service-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    /* Accordion styling */
    .service-card .accordion-button {
        background: #ffffff;
        font-size: 18px;
        font-weight: 600;
        padding: 18px 20px;
        border-bottom: 1px solid #f1f1f1;
        border-radius: 0;
    }

    .service-card .accordion-button:not(.collapsed) {
        background: #fafafa;
        color: #0d6efd;
        font-weight: 700;
    }

    .service-card .accordion-body {
        padding: 20px;
        font-size: 15px;
        color: #555;
    }

    /* Smooth collapse animation */
    .accordion-collapse {
        transition: max-height 0.35s ease;
    }
</style>

<section class="counts section-bg">
    <div class="section-title">
        <h2>Layanan</h2>
    </div>

    <div class="container">
        <div class="row service-grid">
            @foreach ($layanans as $layanan)
                <div class="col-lg-4 col-md-6">

                    <div class="service-card">
                        <div class="accordion" id="accordion{{ $layanan->id }}">

                            <div class="accordion-item">

                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $layanan->id }}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{ $layanan->id }}">
                                        {{ $layanan->layanan }}
                                    </button>
                                </h2>

                                <div id="collapse{{ $layanan->id }}"
                                    class="accordion-collapse collapse"
                                    data-bs-parent="#accordion{{ $layanan->id }}">

                                    <div class="accordion-body">
                                        {!! $layanan->persyaratan !!}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
