@extends('layouts.main')

@section('content')
<!-- ======= Modern Hero Section ======= -->
<section id="hero" class="modern-hero">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
      @foreach ($sliders as $key => $slider)
      <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
        <div class="hero-slide" style="background-image: url('{{ asset('storage/' . $slider->img_slider) }}');">
          <div class="hero-gradient-overlay"></div>
          <div class="container">
            <div class="hero-content-wrapper">
              <div class="hero-badge">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Desa Dongkal</span>
              </div>
              <h1 class="hero-main-title" data-aos="fade-up">{{ $slider->judul }}</h1>
              <p class="hero-description" data-aos="fade-up" data-aos-delay="100">{{ $slider->deskripsi }}</p>
              <div class="hero-cta-group" data-aos="fade-up" data-aos-delay="200">
                <a href="#services" class="cta-btn primary">
                  <span>Jelajahi Layanan</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
                <a href="#news" class="cta-btn secondary">
                  <span>Berita Terkini</span>
                  <i class="bi bi-newspaper"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="carousel-navigation">
      <button class="carousel-control prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <i class="bi bi-chevron-left"></i>
      </button>
      <button class="carousel-control next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>

    <div class="carousel-indicators-modern">
      @foreach ($sliders as $key => $slider)
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}"
              class="indicator {{ $key === 0 ? 'active' : '' }}">
        <span class="progress-bar"></span>
      </button>
      @endforeach
    </div>
  </div>

  <!-- Scroll Indicator -->
  <div class="scroll-indicator">
    <div class="scroll-arrow"></div>
  </div>
</section>

<!-- ======= Services Section ======= -->
<section id="services" class="services-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <div class="section-badge">Layanan Digital</div>
      <h2 class="section-title">Akses Cepat & Mudah</h2>
      <p class="section-subtitle">Nikmati berbagai layanan digital Desa Dongkal yang inovatif</p>
    </div>

    <div class="services-grid">
      <div class="service-card" data-aos="fade-up" data-aos-delay="100">
        <div class="service-icon-wrapper">
          <div class="service-icon primary">
            <i class="bi bi-bar-chart-line-fill"></i>
          </div>
          <div class="icon-bg"></div>
        </div>
        <h3>Data Statistik</h3>
        <p>Lihat data statistik desa secara lengkap dan terperinci dengan visualisasi interaktif</p>
        <a href="/data-desa" class="service-link">
          <span>Selengkapnya</span>
          <i class="bi bi-arrow-up-right"></i>
        </a>
      </div>

      <div class="service-card" data-aos="fade-up" data-aos-delay="150">
        <div class="service-icon-wrapper">
          <div class="service-icon success">
            <i class="bi bi-globe-asia-australia"></i>
          </div>
          <div class="icon-bg"></div>
        </div>
        <h3>Peta Desa</h3>
        <p>Jelajahi wilayah desa melalui peta digital interaktif dengan informasi lengkap</p>
        <a href="/peta-desa" class="service-link">
          <span>Selengkapnya</span>
          <i class="bi bi-arrow-up-right"></i>
        </a>
      </div>

      <div class="service-card" data-aos="fade-up" data-aos-delay="200">
        <div class="service-icon-wrapper">
          <div class="service-icon warning">
            <i class="bi bi-shop"></i>
          </div>
          <div class="icon-bg"></div>
        </div>
        <h3>UMKM Desa</h3>
        <p>Dukung produk lokal dan UMKM masyarakat desa melalui platform digital</p>
        <a href="/umkm" class="service-link">
          <span>Selengkapnya</span>
          <i class="bi bi-arrow-up-right"></i>
        </a>
      </div>

      <div class="service-card" data-aos="fade-up" data-aos-delay="250">
        <div class="service-icon-wrapper">
          <div class="service-icon danger">
            <i class="bi bi-telephone-forward"></i>
          </div>
          <div class="icon-bg"></div>
        </div>
        <h3>Pengaduan</h3>
        <p>Layanan pengaduan masyarakat yang cepat dan transparan melalui aplikasi</p>
        <a href="/kontak" class="service-link">
          <span>Selengkapnya</span>
          <i class="bi bi-arrow-up-right"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ======= Video Profile Section ======= -->
<section id="video" class="video-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <div class="section-badge">Video Profil</div>
      <h2 class="section-title">Kenali Desa Dongkal</h2>
      <p class="section-subtitle">Saksikan keindahan alam dan potensi desa melalui video profil</p>
    </div>

    <div class="video-container" data-aos="zoom-in" data-aos-delay="100">
      <div class="video-wrapper">
        <div class="video-play-button">
          <i class="bi bi-play-fill"></i>
        </div>
        <div class="ratio ratio-16x9">
          <iframe src="{{ $videoProfil->url_video }}" title="Video Profil Desa" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======= Berita Desa Section ======= -->
<section id="news" class="news-section">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <div class="section-badge">Berita Terkini</div>
      <h2 class="section-title">Kabar Terbaru</h2>
      <p class="section-subtitle">Update seputar kegiatan dan perkembangan desa terkini</p>
    </div>

    <div class="news-grid">
      @foreach ($beritas as $berita)
      <article class="news-article" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="article-image">
          <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
          <div class="article-overlay">
            <span class="article-date">
              <i class="bi bi-calendar-event"></i>
              {{ $berita->created_at->diffForHumans() }}
            </span>
          </div>
        </div>
        <div class="article-content">
          <h3>{{ $berita->judul }}</h3>
          <p>{{ $berita->excerpt }}</p>
          <a href="/berita/{{ $berita->slug }}" class="article-link">
            <span>Baca Selengkapnya</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </article>
      @endforeach
    </div>

    <div class="text-center mt-5" data-aos="fade-up">
      <a href="/berita" class="cta-btn primary large">
        <span>Lihat Semua Berita</span>
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<style>
/* ===== MODERN VARIABLES ===== */
:root {
  /* Colors */
  --primary: #2563eb;
  --primary-light: #3b82f6;
  --primary-dark: #1d4ed8;
  --primary-gradient: linear-gradient(135deg, #2563eb, #3b82f6);

  --success: #10b981;
  --success-light: #34d399;
  --success-gradient: linear-gradient(135deg, #10b981, #34d399);

  --warning: #f59e0b;
  --warning-light: #fbbf24;
  --warning-gradient: linear-gradient(135deg, #f59e0b, #fbbf24);

  --danger: #ef4444;
  --danger-light: #f87171;
  --danger-gradient: linear-gradient(135deg, #ef4444, #f87171);

  --dark: #1e293b;
  --dark-light: #334155;
  --darker: #0f172a;

  --gray: #64748b;
  --gray-light: #94a3b8;
  --gray-lighter: #e2e8f0;

  --light: #f8fafc;
  --white: #ffffff;

  /* Effects */
  --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
  --shadow-md: 0 8px 30px rgba(0, 0, 0, 0.12);
  --shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.16);
  --shadow-xl: 0 25px 60px rgba(0, 0, 0, 0.20);

  --glass: rgba(255, 255, 255, 0.08);
  --glass-border: rgba(255, 255, 255, 0.12);
  --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);

  --border-radius: 16px;
  --border-radius-lg: 24px;
  --border-radius-xl: 32px;

  --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  --transition-slow: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);

  /* Spacing */
  --section-padding: 120px 0;
}

/* ===== RESET & BASE STYLES ===== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
  font-size: 16px;
}

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  color: var(--dark);
  line-height: 1.7;
  overflow-x: hidden;
  background: var(--light);
}

/* ===== MODERN HERO SECTION ===== */
.modern-hero {
  position: relative;
  height: 100vh;
  min-height: 700px;
  overflow: hidden;
}

.hero-slide {
  position: relative;
  height: 100vh;
  min-height: 700px;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  display: flex;
  align-items: center;
}

.hero-gradient-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    135deg,
    rgba(37, 99, 235, 0.85) 0%,
    rgba(30, 41, 59, 0.75) 50%,
    rgba(15, 23, 42, 0.85) 100%
  );
  backdrop-filter: blur(2px);
}

.hero-content-wrapper {
  position: relative;
  z-index: 10;
  max-width: 800px;
  color: var(--white);
  padding: 0 2rem;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.75rem 1.5rem;
  background: var(--glass);
  backdrop-filter: blur(20px);
  border: 1px solid var(--glass-border);
  border-radius: 50px;
  font-size: 0.875rem;
  font-weight: 600;
  margin-bottom: 2rem;
  color: var(--white);
  box-shadow: var(--glass-shadow);
}

.hero-main-title {
  font-size: 4rem;
  font-weight: 800;
  line-height: 1.1;
  margin-bottom: 1.5rem;
  letter-spacing: -0.02em;
  background: linear-gradient(135deg, #ffffff, #e2e8f0);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero-description {
  font-size: 1.25rem;
  line-height: 1.7;
  margin-bottom: 3rem;
  opacity: 0.9;
  color: var(--gray-lighter);
}

.hero-cta-group {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

/* ===== MODERN BUTTONS ===== */
.cta-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.75rem;
  padding: 1rem 2.25rem;
  font-weight: 600;
  font-size: 1rem;
  border-radius: 50px;
  text-decoration: none;
  transition: var(--transition);
  border: 2px solid transparent;
  position: relative;
  overflow: hidden;
}

.cta-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.7s ease;
}

.cta-btn:hover::before {
  left: 100%;
}

.cta-btn.primary {
  background: var(--primary-gradient);
  color: var(--white);
  box-shadow: var(--shadow-lg);
}

.cta-btn.primary:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-xl);
}

.cta-btn.secondary {
  background: transparent;
  color: var(--white);
  border: 2px solid rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(10px);
}

.cta-btn.secondary:hover {
  background: rgba(255, 255, 255, 0.1);
  border-color: var(--white);
  transform: translateY(-2px);
}

.cta-btn.large {
  padding: 1.25rem 2.5rem;
  font-size: 1.125rem;
}

/* ===== MODERN CAROUSEL CONTROLS ===== */
.carousel-navigation {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  transform: translateY(-50%);
  z-index: 20;
  pointer-events: none;
}

.carousel-control {
  position: absolute;
  width: 60px;
  height: 60px;
  background: var(--glass);
  backdrop-filter: blur(20px);
  border: 1px solid var(--glass-border);
  border-radius: 50%;
  color: var(--white);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--transition);
  pointer-events: all;
  box-shadow: var(--glass-shadow);
}

.carousel-control:hover {
  background: rgba(255, 255, 255, 0.15);
  transform: scale(1.1);
}

.carousel-control.prev {
  left: 2rem;
}

.carousel-control.next {
  right: 2rem;
}

.carousel-indicators-modern {
  position: absolute;
  bottom: 3rem;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  gap: 0.75rem;
  z-index: 20;
}

.indicator {
  width: 40px;
  height: 4px;
  background: rgba(255, 255, 255, 0.3);
  border: none;
  border-radius: 2px;
  overflow: hidden;
  position: relative;
  transition: var(--transition);
}

.indicator.active {
  background: rgba(255, 255, 255, 0.5);
}

.indicator.active .progress-bar {
  animation: progress 5s linear infinite;
}

@keyframes progress {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(0); }
}

.progress-bar {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: var(--white);
  transform: translateX(-100%);
}

.scroll-indicator {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  transform: translateX(-50%);
  z-index: 20;
}

.scroll-arrow {
  width: 2px;
  height: 40px;
  background: rgba(255, 255, 255, 0.6);
  position: relative;
}

.scroll-arrow::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 12px;
  height: 12px;
  border-right: 2px solid rgba(255, 255, 255, 0.6);
  border-bottom: 2px solid rgba(255, 255, 255, 0.6);
  transform: translateX(-50%) rotate(45deg);
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateX(-50%) rotate(45deg) translateY(0);
  }
  40% {
    transform: translateX(-50%) rotate(45deg) translateY(-10px);
  }
  60% {
    transform: translateX(-50%) rotate(45deg) translateY(-5px);
  }
}

/* ===== SECTIONS STYLES ===== */
.services-section,
.news-section {
  padding: var(--section-padding);
  background: var(--light);
}

.video-section {
  padding: var(--section-padding);
  background: var(--darker);
  color: var(--white);
}

.section-header {
  text-align: center;
  margin-bottom: 4rem;
}

.section-badge {
  display: inline-block;
  padding: 0.75rem 1.5rem;
  background: rgba(37, 99, 235, 0.1);
  color: var(--primary);
  border-radius: 50px;
  font-size: 0.875rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 1rem;
}

.video-section .section-badge {
  background: rgba(255, 255, 255, 0.1);
  color: var(--white);
}

.section-title {
  font-size: 3.5rem;
  font-weight: 800;
  margin-bottom: 1rem;
  line-height: 1.1;
}

.video-section .section-title {
  color: var(--white);
}

.section-subtitle {
  font-size: 1.25rem;
  color: var(--gray);
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

.video-section .section-subtitle {
  color: var(--gray-light);
}

/* ===== SERVICES GRID ===== */
.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
}

.service-card {
  background: var(--white);
  padding: 3rem 2rem;
  border-radius: var(--border-radius-lg);
  text-align: center;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  border: 1px solid rgba(0, 0, 0, 0.03);
}

.service-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 4px;
  background: var(--primary-gradient);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.6s ease;
}

.service-card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-xl);
}

.service-card:hover::before {
  transform: scaleX(1);
}

.service-icon-wrapper {
  position: relative;
  display: inline-block;
  margin-bottom: 2rem;
}

.service-icon {
  width: 80px;
  height: 80px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  color: var(--white);
  position: relative;
  z-index: 2;
  transition: var(--transition);
}

.service-card:hover .service-icon {
  transform: scale(1.1) rotate(5deg);
}

.icon-bg {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 100px;
  border-radius: 50%;
  opacity: 0.1;
  transition: var(--transition);
}

.service-card:hover .icon-bg {
  transform: translate(-50%, -50%) scale(1.2);
}

.service-icon.primary {
  background: var(--primary-gradient);
}

.service-icon.success {
  background: var(--success-gradient);
}

.service-icon.warning {
  background: var(--warning-gradient);
}

.service-icon.danger {
  background: var(--danger-gradient);
}

.icon-bg.primary { background: var(--primary); }
.icon-bg.success { background: var(--success); }
.icon-bg.warning { background: var(--warning); }
.icon-bg.danger { background: var(--danger); }

.service-card h3 {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
  color: var(--dark);
}

.service-card p {
  color: var(--gray);
  margin-bottom: 2rem;
  line-height: 1.6;
}

.service-link {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--primary);
  text-decoration: none;
  font-weight: 600;
  transition: var(--transition);
  position: relative;
}

.service-link::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--primary);
  transition: width 0.3s ease;
}

.service-link:hover {
  gap: 0.75rem;
}

.service-link:hover::after {
  width: 100%;
}

/* ===== VIDEO SECTION ===== */
.video-container {
  max-width: 900px;
  margin: 0 auto;
}

.video-wrapper {
  position: relative;
  border-radius: var(--border-radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  transition: var(--transition);
}

.video-wrapper:hover {
  transform: scale(1.02);
}

.video-play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80px;
  height: 80px;
  background: rgba(255, 255, 255, 0.9);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--primary);
  font-size: 2rem;
  z-index: 10;
  transition: var(--transition);
  cursor: pointer;
}

.video-wrapper:hover .video-play-button {
  background: var(--white);
  transform: translate(-50%, -50%) scale(1.1);
}

/* ===== NEWS GRID ===== */
.news-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 2rem;
}

.news-article {
  background: var(--white);
  border-radius: var(--border-radius-lg);
  overflow: hidden;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
  border: 1px solid rgba(0, 0, 0, 0.03);
}

.news-article:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl);
}

.article-image {
  position: relative;
  height: 240px;
  overflow: hidden;
}

.article-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition-slow);
}

.news-article:hover .article-image img {
  transform: scale(1.1);
}

.article-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.3));
  opacity: 0;
  transition: var(--transition);
}

.news-article:hover .article-overlay {
  opacity: 1;
}

.article-date {
  position: absolute;
  top: 1rem;
  left: 1rem;
  padding: 0.5rem 1rem;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 50px;
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--dark);
  box-shadow: var(--shadow-sm);
}

.article-content {
  padding: 2rem;
}

.article-content h3 {
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 1rem;
  line-height: 1.4;
  color: var(--dark);
}

.article-content p {
  color: var(--gray);
  margin-bottom: 1.5rem;
  line-height: 1.6;
}

.article-link {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--primary);
  text-decoration: none;
  font-weight: 600;
  transition: var(--transition);
  position: relative;
}

.article-link::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--primary);
  transition: width 0.3s ease;
}

.article-link:hover {
  gap: 0.75rem;
}

.article-link:hover::after {
  width: 100%;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 1200px) {
  .hero-main-title {
    font-size: 3.5rem;
  }

  .section-title {
    font-size: 3rem;
  }
}

@media (max-width: 992px) {
  :root {
    --section-padding: 100px 0;
  }

  .hero-main-title {
    font-size: 3rem;
  }

  .section-title {
    font-size: 2.5rem;
  }

  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .modern-hero {
    min-height: 600px;
  }

  .hero-slide {
    min-height: 600px;
    background-attachment: scroll;
  }

  .hero-main-title {
    font-size: 2.5rem;
  }

  .hero-description {
    font-size: 1.125rem;
  }

  .hero-cta-group {
    flex-direction: column;
    align-items: flex-start;
  }

  .cta-btn {
    width: 100%;
    justify-content: center;
  }

  .carousel-control {
    width: 50px;
    height: 50px;
  }

  .carousel-control.prev {
    left: 1rem;
  }

  .carousel-control.next {
    right: 1rem;
  }

  .services-grid {
    grid-template-columns: 1fr;
  }

  .news-grid {
    grid-template-columns: 1fr;
  }

  .section-title {
    font-size: 2.25rem;
  }
}

@media (max-width: 576px) {
  .hero-main-title {
    font-size: 2rem;
  }

  .hero-content-wrapper {
    padding: 0 1rem;
  }

  .section-title {
    font-size: 2rem;
  }

  .section-badge {
    font-size: 0.75rem;
    padding: 0.5rem 1rem;
  }

  .service-card {
    padding: 2rem 1.5rem;
  }

  .article-content {
    padding: 1.5rem;
  }
}

/* ===== AOS CUSTOM ANIMATIONS ===== */
[data-aos] {
  pointer-events: none;
}

[data-aos].aos-animate {
  pointer-events: auto;
}

/* ===== SMOOTH SCROLL BEHAVIOR ===== */
html {
  scroll-behavior: smooth;
}

/* ===== ACCESSIBILITY ===== */
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }

  html {
    scroll-behavior: auto;
  }
}
</style>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
      duration: 800,
      easing: 'ease-out-cubic',
      once: true,
      offset: 50
    });
  });
</script>
@endsection
