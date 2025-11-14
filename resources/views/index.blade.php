@extends('layouts.main')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero-modern">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
      @foreach ($sliders as $key => $slider)
      <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
        <div class="hero-slide" style="background-image: url('{{ asset('storage/' . $slider->img_slider) }}');">
          <div class="hero-overlay"></div>
          <div class="container">
            <div class="hero-content">
              <span class="hero-label">Desa Dongkal</span>
              <h1 class="hero-title">{{ $slider->judul }}</h1>
              <p class="hero-desc">{{ $slider->deskripsi }}</p>
              <div class="hero-actions">
                <a href="#services" class="btn-primary-custom">Jelajahi Layanan</a>
                <a href="#news" class="btn-outline-custom">Berita Terkini</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <i class="bi bi-chevron-left"></i>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <i class="bi bi-chevron-right"></i>
    </button>

    <div class="carousel-indicators">
      @foreach ($sliders as $key => $slider)
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></button>
      @endforeach
    </div>
  </div>
</section>

<!-- ======= Services Section ======= -->
<section id="services" class="section-modern">
  <div class="container">
    <div class="section-head">
      <span class="section-label">Layanan Digital</span>
      <h2 class="section-title">Akses Cepat & Mudah</h2>
      <p class="section-subtitle">Nikmati berbagai layanan digital Desa Dongkal</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <a href="/data-desa" class="service-box">
          <div class="service-icon bg-primary">
            <i class="bi bi-bar-chart-line-fill"></i>
          </div>
          <h4>Data Statistik</h4>
          <p>Lihat data statistik desa secara lengkap dan terperinci</p>
          <span class="service-arrow"><i class="bi bi-arrow-right"></i></span>
        </a>
      </div>

      <div class="col-lg-3 col-md-6">
        <a href="/peta-desa" class="service-box">
          <div class="service-icon bg-success">
            <i class="bi bi-globe-asia-australia"></i>
          </div>
          <h4>Peta Desa</h4>
          <p>Jelajahi wilayah desa melalui peta interaktif</p>
          <span class="service-arrow"><i class="bi bi-arrow-right"></i></span>
        </a>
      </div>

      <div class="col-lg-3 col-md-6">
        <a href="/umkm" class="service-box">
          <div class="service-icon bg-warning">
            <i class="bi bi-shop"></i>
          </div>
          <h4>UMKM Desa</h4>
          <p>Dukung produk lokal dan UMKM masyarakat</p>
          <span class="service-arrow"><i class="bi bi-arrow-right"></i></span>
        </a>
      </div>

      <div class="col-lg-3 col-md-6">
        <a href="/kontak" class="service-box">
          <div class="service-icon bg-danger">
            <i class="bi bi-telephone-forward"></i>
          </div>
          <h4>Pengaduan</h4>
          <p>Layanan tersedia di aplikasi mobile</p>
          <span class="service-arrow"><i class="bi bi-arrow-right"></i></span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ======= Video Profile Section ======= -->
<section id="video" class="section-modern section-dark">
  <div class="container">
    <div class="section-head">
      <span class="section-label">Video Profil</span>
      <h2 class="section-title text-white">Kenali Desa Dongkal</h2>
      <p class="section-subtitle text-white-50">Saksikan keindahan dan potensi desa</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="video-box">
          <div class="ratio ratio-16x9">
            <iframe src="{{ $videoProfil->url_video }}" title="Video Profil Desa" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======= Berita Desa Section ======= -->
<section id="news" class="section-modern">
  <div class="container">
    <div class="section-head">
      <span class="section-label">Berita Terkini</span>
      <h2 class="section-title">Kabar Terbaru</h2>
      <p class="section-subtitle">Update seputar kegiatan dan perkembangan desa</p>
    </div>

    <div class="row g-4">
      @foreach ($beritas as $berita)
      <div class="col-lg-4 col-md-6">
        <article class="news-card">
          <div class="news-img">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
            <span class="news-date">
              <i class="bi bi-calendar-event"></i> {{ $berita->created_at->diffForHumans() }}
            </span>
          </div>
          <div class="news-body">
            <h3>{{ $berita->judul }}</h3>
            <p>{{ $berita->excerpt }}</p>
            <a href="/berita/{{ $berita->slug }}" class="news-link">
              Baca Selengkapnya <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </article>
      </div>
      @endforeach
    </div>

    <div class="text-center mt-5">
      <a href="/berita" class="btn-primary-custom btn-large">
        Lihat Semua Berita <i class="bi bi-arrow-right ms-2"></i>
      </a>
    </div>
  </div>
</section>

<style>
/* === Global Variables === */
:root {
  --primary: #4f46e5;
  --success: #10b981;
  --warning: #f59e0b;
  --danger: #ef4444;
  --dark: #1e293b;
  --gray: #64748b;
  --light: #f8fafc;
}

/* === Reset === */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  color: var(--dark);
  line-height: 1.6;
}

/* === Hero Section === */
.hero-modern {
  position: relative;
  height: 100vh;
  min-height: 600px;
}

.hero-slide {
  height: 100vh;
  min-height: 600px;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  position: relative;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(79, 70, 229, 0.9), rgba(16, 185, 129, 0.8));
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  max-width: 700px;
  color: white;
}

.hero-label {
  display: inline-block;
  padding: 8px 20px;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  border-radius: 50px;
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 20px;
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.hero-title {
  font-size: 56px;
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: 20px;
  letter-spacing: -0.02em;
}

.hero-desc {
  font-size: 20px;
  line-height: 1.7;
  margin-bottom: 35px;
  opacity: 0.95;
}

.hero-actions {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

/* === Buttons === */
.btn-primary-custom,
.btn-outline-custom {
  display: inline-flex;
  align-items: center;
  padding: 14px 32px;
  font-weight: 600;
  font-size: 16px;
  border-radius: 50px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn-primary-custom {
  background: white;
  color: var(--primary);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.btn-primary-custom:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
  color: var(--primary);
}

.btn-outline-custom {
  background: transparent;
  color: white;
  border: 2px solid rgba(255, 255, 255, 0.5);
}

.btn-outline-custom:hover {
  background: rgba(255, 255, 255, 0.15);
  border-color: white;
  color: white;
}

.btn-large {
  padding: 16px 40px;
  font-size: 18px;
}

/* === Carousel Controls === */
.carousel-control-prev,
.carousel-control-next {
  width: 50px;
  height: 50px;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  border-radius: 50%;
  border: 1px solid rgba(255, 255, 255, 0.3);
  opacity: 0.8;
  transition: all 0.3s;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
  opacity: 1;
  background: rgba(255, 255, 255, 0.3);
}

.carousel-control-prev {
  left: 30px;
}

.carousel-control-next {
  right: 30px;
}

.carousel-control-prev i,
.carousel-control-next i {
  font-size: 24px;
}

.carousel-indicators {
  bottom: 30px;
  margin: 0;
}

.carousel-indicators button {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin: 0 5px;
  border: 2px solid white;
  opacity: 0.5;
}

.carousel-indicators button.active {
  width: 30px;
  border-radius: 5px;
  opacity: 1;
}

/* === Section Styles === */
.section-modern {
  padding: 100px 0;
  background: var(--light);
}

.section-dark {
  background: var(--dark);
}

.section-head {
  text-align: center;
  margin-bottom: 60px;
}

.section-label {
  display: inline-block;
  padding: 8px 20px;
  background: rgba(79, 70, 229, 0.1);
  color: var(--primary);
  border-radius: 50px;
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 15px;
}

.section-title {
  font-size: 48px;
  font-weight: 800;
  margin-bottom: 15px;
  color: var(--dark);
}

.section-subtitle {
  font-size: 18px;
  color: var(--gray);
  max-width: 600px;
  margin: 0 auto;
}

/* === Service Box === */
.service-box {
  display: block;
  background: white;
  border-radius: 20px;
  padding: 35px;
  text-decoration: none;
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 0, 0, 0.05);
  height: 100%;
  position: relative;
}

.service-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
  border-color: transparent;
}

.service-icon {
  width: 70px;
  height: 70px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 25px;
  font-size: 32px;
  color: white;
}

.bg-primary {
  background: linear-gradient(135deg, #6366f1, #4f46e5);
}

.bg-success {
  background: linear-gradient(135deg, #10b981, #059669);
}

.bg-warning {
  background: linear-gradient(135deg, #f59e0b, #d97706);
}

.bg-danger {
  background: linear-gradient(135deg, #ef4444, #dc2626);
}

.service-box h4 {
  font-size: 22px;
  font-weight: 700;
  color: var(--dark);
  margin-bottom: 12px;
}

.service-box p {
  font-size: 15px;
  color: var(--gray);
  margin-bottom: 20px;
  line-height: 1.6;
}

.service-arrow {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background: var(--light);
  border-radius: 50%;
  color: var(--primary);
  transition: all 0.3s;
}

.service-box:hover .service-arrow {
  background: var(--primary);
  color: white;
  transform: translateX(5px);
}

/* === Video Box === */
.video-box {
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.video-box iframe {
  border: none;
}

/* === News Card === */
.news-card {
  background: white;
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 0, 0, 0.05);
  height: 100%;
  display: flex;
  flex-direction: column;
}

.news-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
}

.news-img {
  position: relative;
  height: 250px;
  overflow: hidden;
}

.news-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s;
}

.news-card:hover .news-img img {
  transform: scale(1.05);
}

.news-date {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 8px 16px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 50px;
  font-size: 13px;
  font-weight: 600;
  color: var(--dark);
  z-index: 2;
}

.news-body {
  padding: 30px;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.news-body h3 {
  font-size: 20px;
  font-weight: 700;
  color: var(--dark);
  margin-bottom: 12px;
  line-height: 1.4;
}

.news-body p {
  font-size: 15px;
  color: var(--gray);
  margin-bottom: 20px;
  line-height: 1.6;
  flex: 1;
}

.news-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
  font-size: 15px;
  color: var(--primary);
  text-decoration: none;
  transition: gap 0.3s;
}

.news-link:hover {
  gap: 12px;
  color: var(--primary);
}

/* === Responsive === */
@media (max-width: 992px) {
  .hero-title {
    font-size: 42px;
  }

  .hero-desc {
    font-size: 18px;
  }

  .section-title {
    font-size: 38px;
  }

  .section-modern {
    padding: 80px 0;
  }
}

@media (max-width: 768px) {
  .hero-slide {
    height: 80vh;
  }

  .hero-title {
    font-size: 36px;
  }

  .hero-desc {
    font-size: 16px;
  }

  .hero-actions {
    flex-direction: column;
  }

  .hero-actions a {
    width: 100%;
    justify-content: center;
  }

  .carousel-control-prev,
  .carousel-control-next {
    width: 40px;
    height: 40px;
  }

  .carousel-control-prev {
    left: 15px;
  }

  .carousel-control-next {
    right: 15px;
  }

  .section-title {
    font-size: 32px;
  }

  .section-modern {
    padding: 60px 0;
  }

  .service-box {
    padding: 25px;
  }
}

@media (max-width: 576px) {
  .hero-title {
    font-size: 28px;
  }

  .section-title {
    font-size: 28px;
  }

  .btn-primary-custom,
  .btn-outline-custom {
    padding: 12px 24px;
    font-size: 14px;
  }
}
</style>
@endsection
