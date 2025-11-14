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
                    <li class="active">Visi & Misi</li>
                </ol>
            </nav>
            <h1 class="page-title">Visi & Misi</h1>
            <p class="page-subtitle">Arah dan tujuan pembangunan Desa Dongkal</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="visi-misi-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Visi Card -->
                <div class="visi-card">
                    <div class="card-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Visi</h3>
                        <div class="card-body-text">
                            {!! $visiMisi->visi !!}
                        </div>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="misi-card">
                    <div class="card-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Misi</h3>
                        <div class="card-body-text">
                            {!! $visiMisi->misi !!}
                        </div>
                    </div>
                </div>
            </div>
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

/* === Visi Misi Section === */
.visi-misi-section {
    padding: 80px 0;
    background: #f8fafc;
}

/* Visi Card */
.visi-card {
    background: white;
    border-radius: 20px;
    padding: 45px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.05);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.visi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background: linear-gradient(180deg, #4f46e5, #6366f1);
}

.visi-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(79, 70, 229, 0.15);
}

/* Misi Card */
.misi-card {
    background: white;
    border-radius: 20px;
    padding: 45px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.misi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background: linear-gradient(180deg, #10b981, #14b8a6);
}

.misi-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.15);
}

/* Card Content */
.card-icon {
    width: 70px;
    height: 70px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin-bottom: 25px;
}

.visi-card .card-icon {
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(99, 102, 241, 0.15));
    color: #4f46e5;
}

.misi-card .card-icon {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(20, 184, 166, 0.15));
    color: #10b981;
}

.card-title {
    font-size: 28px;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
}

.card-body-text {
    color: #334155;
    font-size: 16px;
    line-height: 1.8;
}

/* Typography dalam card */
.card-body-text p {
    margin-bottom: 15px;
    text-align: justify;
}

.card-body-text ul,
.card-body-text ol {
    margin-bottom: 20px;
    padding-left: 30px;
}

.card-body-text li {
    margin-bottom: 12px;
    line-height: 1.7;
}

.card-body-text strong {
    color: #1e293b;
    font-weight: 700;
}

.card-body-text em {
    font-style: italic;
    color: #64748b;
}

.card-body-text h4,
.card-body-text h5,
.card-body-text h6 {
    color: #1e293b;
    font-weight: 700;
    margin-top: 20px;
    margin-bottom: 12px;
}

/* List Styling untuk Misi */
.misi-card .card-body-text ol {
    counter-reset: misi-counter;
    list-style: none;
    padding-left: 0;
}

.misi-card .card-body-text ol li {
    counter-increment: misi-counter;
    position: relative;
    padding-left: 50px;
    margin-bottom: 20px;
}

.misi-card .card-body-text ol li::before {
    content: counter(misi-counter);
    position: absolute;
    left: 0;
    top: 0;
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, #10b981, #14b8a6);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
}

/* === Responsive === */
@media (max-width: 992px) {
    .page-hero {
        padding: 120px 0 60px;
    }

    .page-title {
        font-size: 38px;
    }

    .visi-misi-section {
        padding: 60px 0;
    }

    .visi-card,
    .misi-card {
        padding: 35px;
    }

    .card-title {
        font-size: 24px;
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

    .visi-misi-section {
        padding: 50px 0;
    }

    .visi-card,
    .misi-card {
        padding: 30px 25px;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        font-size: 28px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 22px;
    }

    .card-body-text {
        font-size: 15px;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 28px;
    }

    .visi-card,
    .misi-card {
        padding: 25px 20px;
    }

    .card-icon {
        width: 55px;
        height: 55px;
        font-size: 24px;
    }

    .card-title {
        font-size: 20px;
    }

    .misi-card .card-body-text ol li {
        padding-left: 45px;
    }

    .misi-card .card-body-text ol li::before {
        width: 30px;
        height: 30px;
        font-size: 14px;
    }
}

/* Print Styles */
@media print {
    .page-hero {
        background: white;
        color: black;
    }

    .hero-overlay {
        display: none;
    }

    .breadcrumb-custom {
        display: none;
    }

    .visi-card,
    .misi-card {
        box-shadow: none;
        border: 1px solid #ddd;
        page-break-inside: avoid;
    }
}
</style>
@endsection
