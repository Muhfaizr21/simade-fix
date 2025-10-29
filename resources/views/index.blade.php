@extends('layouts.main')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div id="heroCarousel" class="container-fluid carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      @foreach ($sliders as $key => $slider)
      <div class="carousel-item {{ $key === 0 ? 'active' : '' }}"
        style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url('{{ asset('storage/' . $slider->img_slider) }}') center center / cover no-repeat; height: 90vh;">
        <div class="carousel-container text-center">
          <div class="carousel-content animate__animated animate__fadeInUp">
            <h2 class="text-light fw-bold mb-3 display-5">{{ $slider->judul }}</h2>
            <p class="text-light mx-auto" style="max-width: 700px;">{{ $slider->deskripsi }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>
</section>
<!-- End Hero -->

<!-- ======= Services Section ======= -->
<section id="services" class="services py-5 bg-light">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-4">
      <h2 class="fw-bold">Layanan Cepat</h2>
      <p class="text-muted">Akses fitur utama Desa Dongkal dengan cepat dan mudah.</p>
    </div>

    <div class="row text-center">
      <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box p-4 bg-white shadow-sm rounded-3 h-100">
          <div class="icon mb-3 text-primary fs-2"><i class="bi bi-bar-chart-line-fill"></i></div>
          <h5><a href="/data-desa" class="text-dark text-decoration-none fw-semibold">Data Statistik</a></h5>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box p-4 bg-white shadow-sm rounded-3 h-100">
          <div class="icon mb-3 text-success fs-2"><i class="bi bi-globe-asia-australia"></i></div>
          <h5><a href="/peta-desa" class="text-dark text-decoration-none fw-semibold">Peta Desa</a></h5>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box p-4 bg-white shadow-sm rounded-3 h-100">
          <div class="icon mb-3 text-warning fs-2"><i class="bi bi-shop"></i></div>
          <h5><a href="/umkm" class="text-dark text-decoration-none fw-semibold">UMKM Desa</a></h5>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box p-4 bg-white shadow-sm rounded-3 h-100">
          <div class="icon mb-3 text-danger fs-2"><i class="bi bi-telephone-forward"></i></div>
          <h5><a href="/kontak" class="text-dark text-decoration-none fw-semibold">Pengaduan </a>Layanan tersedia di aplikasi mobile</h5>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======= Video Profile Section ======= -->
<section id="video" class="py-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-4">
      <h2 class="fw-bold">Video Profil Desa</h2>
      <p class="text-muted">Kenali lebih dekat Desa Dongkal melalui video profil singkat berikut.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="ratio ratio-16x9 shadow-lg rounded-3 overflow-hidden">
          <iframe src="{{ $videoProfil->url_video }}" title="Video Profil Desa" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======= Berita Desa Section ======= -->
<section id="news" class="py-5 bg-light">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-4">
      <h2 class="fw-bold">Berita Terkini</h2>
      <p class="text-muted">Kabar terbaru dan kegiatan menarik dari Desa Dongkal.</p>
    </div>

    <div class="row">
      @foreach ($beritas as $berita)
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
        <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
          <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="Gambar Berita" style="height:230px;object-fit:cover;">
          <div class="card-body">
            <h5 class="fw-bold">{{ $berita->judul }}</h5>
            <p class="text-muted small">{{ $berita->excerpt }}</p>
            <small class="text-secondary"><i class="bi bi-calendar-event"></i> {{ $berita->created_at->diffForHumans() }}</small>
          </div>
          <div class="card-footer bg-white border-0 text-end">
            <a href="/berita/{{ $berita->slug }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Selengkapnya</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="text-center mt-3">
      <a href="/berita" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">Lihat Semua Berita</a>
    </div>
  </div>
</section>
@endsection
