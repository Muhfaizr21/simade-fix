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
                    <li class="active">{{ $wilayah->judul }}</li>
                </ol>
            </nav>
            <h1 class="page-title">{{ $wilayah->judul }}</h1>
            <p class="page-subtitle">Informasi lengkap tentang wilayah Desa Dongkal</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="content-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-box">
                    <div class="content-body">
                        {!! $wilayah->body !!}
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

/* === Content Section === */
.content-section {
    padding: 80px 0;
    background: #f8fafc;
}

.content-box {
    background: white;
    border-radius: 20px;
    padding: 50px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.content-body {
    color: #334155;
    font-size: 16px;
    line-height: 1.8;
}

/* Content Typography */
.content-body h1,
.content-body h2,
.content-body h3,
.content-body h4,
.content-body h5,
.content-body h6 {
    color: #1e293b;
    font-weight: 700;
    margin-top: 30px;
    margin-bottom: 15px;
    line-height: 1.3;
}

.content-body h1 {
    font-size: 36px;
    margin-top: 0;
}

.content-body h2 {
    font-size: 30px;
    padding-bottom: 10px;
    border-bottom: 3px solid #4f46e5;
    display: inline-block;
}

.content-body h3 {
    font-size: 24px;
    color: #4f46e5;
}

.content-body h4 {
    font-size: 20px;
}

.content-body p {
    margin-bottom: 20px;
    text-align: justify;
}

.content-body ul,
.content-body ol {
    margin-bottom: 20px;
    padding-left: 30px;
}

.content-body li {
    margin-bottom: 10px;
}

.content-body a {
    color: #4f46e5;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
}

.content-body a:hover {
    color: #10b981;
}

.content-body img {
    max-width: 100%;
    height: auto;
    border-radius: 15px;
    margin: 25px 0;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.content-body blockquote {
    background: #f8fafc;
    border-left: 4px solid #4f46e5;
    padding: 20px 30px;
    margin: 25px 0;
    border-radius: 0 10px 10px 0;
    font-style: italic;
    color: #64748b;
}

.content-body table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.content-body table thead {
    background: linear-gradient(135deg, #4f46e5, #10b981);
    color: white;
}

.content-body table th,
.content-body table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e2e8f0;
}

.content-body table tbody tr:hover {
    background: #f8fafc;
}

.content-body table tbody tr:last-child td {
    border-bottom: none;
}

.content-body code {
    background: #f1f5f9;
    padding: 3px 8px;
    border-radius: 5px;
    font-size: 14px;
    color: #dc2626;
    font-family: 'Courier New', monospace;
}

.content-body pre {
    background: #1e293b;
    color: #e2e8f0;
    padding: 20px;
    border-radius: 10px;
    overflow-x: auto;
    margin: 25px 0;
}

.content-body pre code {
    background: transparent;
    color: inherit;
    padding: 0;
}

.content-body hr {
    border: none;
    border-top: 2px solid #e2e8f0;
    margin: 40px 0;
}

/* Strong & Em */
.content-body strong {
    color: #1e293b;
    font-weight: 700;
}

.content-body em {
    font-style: italic;
    color: #64748b;
}

/* === Responsive === */
@media (max-width: 992px) {
    .page-hero {
        padding: 120px 0 60px;
    }

    .page-title {
        font-size: 38px;
    }

    .content-section {
        padding: 60px 0;
    }

    .content-box {
        padding: 40px;
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

    .content-section {
        padding: 50px 0;
    }

    .content-box {
        padding: 30px 25px;
    }

    .content-body {
        font-size: 15px;
    }

    .content-body h1 {
        font-size: 28px;
    }

    .content-body h2 {
        font-size: 24px;
    }

    .content-body h3 {
        font-size: 20px;
    }

    .breadcrumb-custom {
        font-size: 13px;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 28px;
    }

    .content-box {
        padding: 25px 20px;
    }

    .content-body table {
        font-size: 14px;
    }

    .content-body table th,
    .content-body table td {
        padding: 10px;
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

    .content-box {
        box-shadow: none;
        border: 1px solid #ddd;
    }
}
</style>
@endsection
