@extends('layouts.main')

@section('content')
<!-- Hero Banner -->
<section class="page-hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content-page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb-custom">
                    <li><a href="/"><i class="bi bi-house-door"></i> Beranda</a></li>
                    <li><i class="bi bi-chevron-right"></i></li>
                    <li class="active">Perangkat Desa</li>
                </ol>
            </nav>
            <h1 class="page-title">Perangkat Desa Dongkal</h1>
            <p class="page-subtitle">Tim yang berdedikasi untuk kemajuan desa</p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="row g-4">
            @foreach ($perangkatDesa as $perangkat)
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                <div class="member-card">
                    <div class="member-photo">
                        <img src="{{ asset('storage/' . $perangkat->foto) }}" alt="{{ $perangkat->nama }}">
                        <div class="photo-overlay"></div>
                    </div>
                    <div class="member-info">
                        <h4 class="member-name">{{ $perangkat->nama }}</h4>
                        <span class="member-position">{{ $perangkat->jabatan }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
/* === Page Hero === */
.page-hero {
    position: relative;
    padding: 140px 0 80px;
    background: linear-gradient(135deg, #4f46e5 0%, #10b981 100%);
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
}

.hero-content-page {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

/* Breadcrumb */
.breadcrumb-custom {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
    padding: 0;
    list-style: none;
}

.breadcrumb-custom li {
    display: flex;
    align-items: center;
}

.breadcrumb-custom a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: color 0.3s;
    display: flex;
    align-items: center;
    gap: 5px;
}

.breadcrumb-custom a:hover {
    color: white;
}

.breadcrumb-custom .active {
    color: white;
    font-weight: 600;
    font-size: 14px;
}

.breadcrumb-custom i {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.6);
}

/* Page Title */
.page-title {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 15px;
    color: white;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.page-subtitle {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

/* === Team Section === */
.team-section {
    padding: 80px 0;
    background: #f8fafc;
}

/* Member Card */
.member-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.member-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
}

/* Member Photo */
.member-photo {
    position: relative;
    width: 100%;
    padding-top: 100%;
    overflow: hidden;
    background: #e2e8f0;
}

.member-photo img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.member-card:hover .member-photo img {
    transform: scale(1.1);
}

.photo-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.member-card:hover .photo-overlay {
    opacity: 1;
}

/* Member Info */
.member-info {
    padding: 25px 20px;
    text-align: center;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.member-name {
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
    line-height: 1.3;
}

.member-position {
    display: inline-block;
    font-size: 14px;
    color: #64748b;
    font-weight: 600;
    padding: 6px 16px;
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.08), rgba(16, 185, 129, 0.08));
    border-radius: 50px;
    transition: all 0.3s ease;
}

.member-card:hover .member-position {
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.15), rgba(16, 185, 129, 0.15));
    color: #4f46e5;
}

/* === Responsive === */
@media (max-width: 992px) {
    .page-hero {
        padding: 120px 0 60px;
    }

    .page-title {
        font-size: 38px;
    }

    .team-section {
        padding: 60px 0;
    }
}

@media (max-width: 768px) {
    .page-hero {
        padding: 100px 0 50px;
    }

    .page-title {
        font-size: 32px;
    }

    .page-subtitle {
        font-size: 16px;
    }

    .team-section {
        padding: 50px 0;
    }

    .member-info {
        padding: 20px 15px;
    }

    .member-name {
        font-size: 17px;
    }

    .member-position {
        font-size: 13px;
        padding: 5px 14px;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 28px;
    }

    .member-card {
        max-width: 350px;
        margin: 0 auto;
    }

    .member-name {
        font-size: 16px;
    }

    .member-position {
        font-size: 12px;
    }
}

/* AOS Animation Enhancement */
[data-aos="fade-up"] {
    transform: translateY(50px);
    opacity: 0;
    transition: all 0.8s ease;
}

[data-aos="fade-up"].aos-animate {
    transform: translateY(0);
    opacity: 1;
}

/* Print Styles */
@media print {
    .page-hero {
        background: white;
        color: black;
        padding: 40px 0 20px;
    }

    .hero-overlay {
        display: none;
    }

    .breadcrumb-custom {
        display: none;
    }

    .team-section {
        padding: 30px 0;
    }

    .member-card {
        box-shadow: none;
        border: 1px solid #ddd;
        page-break-inside: avoid;
        margin-bottom: 20px;
    }
}
</style>
@endsection
