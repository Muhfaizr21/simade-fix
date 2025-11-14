@extends('admin.layouts.main')

@section('content')
<style>
    :root {
        /* Warna Dasar */
        --primary: #1e40af; /* Biru Tua/Indigo untuk kesan profesional */
        --secondary: #475569; /* Abu-abu Slate */
        --success: #059669; /* Hijau Emerald */
        --danger: #dc2626; /* Merah */
        --warning: #fbbf24; /* Kuning Amber */
        --dark: #0f172a;
        --light: #f8fafc; /* Latar Belakang Sangat Terang */

        /* Warna Bayangan */
        --shadow-subtle: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }

    body {
        background: #f1f5f9; /* Latar belakang lebih netral */
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--dark);
    }

    /* --- Hero Card: Lebih premium dan menenangkan --- */
    .hero-card {
        background: white;
        border-radius: 18px; /* Lebih bulat */
        border: none;
        box-shadow: var(--shadow-lg); /* Bayangan yang elegan */
        overflow: hidden;
        margin-bottom: 30px;
    }

    .hero-content {
        padding: 50px 40px;
        /* Gradasi latar belakang yang lembut dan profesional */
        background: linear-gradient(105deg, #ffffff 60%, #e2e8f0 100%);
    }

    .hero-title {
        font-size: 32px;
        font-weight: 800; /* Lebih tebal */
        color: var(--primary); /* Menggunakan warna primary untuk judul utama */
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 16px;
        color: var(--secondary);
        font-weight: 500;
        max-width: 700px;
    }

    /* --- Stats Grid: Modern dan Timbul --- */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-box {
        background: white;
        border-radius: 14px;
        padding: 30px;
        border: none;
        box-shadow: var(--shadow-subtle);
        transition: all 0.3s ease;
        position: relative;
    }

    .stat-box:hover {
        box-shadow: 0 10px 20px -5px rgb(0 0 0 / 0.15);
        transform: translateY(-4px); /* Efek timbul yang lebih jelas */
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center; /* Ikon dan label sejajar vertikal */
        margin-bottom: 20px;
    }

    .stat-label {
        font-size: 14px;
        font-weight: 700;
        color: var(--secondary);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .stat-icon {
        width: 48px; /* Ukuran ikon lebih besar */
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        box-shadow: var(--shadow-subtle);
    }

    .stat-value {
        font-size: 40px; /* Nilai lebih besar */
        font-weight: 800;
        color: var(--dark);
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-description {
        font-size: 14px;
        color: #94a3b8; /* Warna abu-abu yang lebih tenang */
    }

    /* --- Content Cards: Bersih dan terstruktur --- */
    .content-wrapper {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 25px;
    }

    .content-card {
        background: white;
        border-radius: 14px;
        border: none;
        box-shadow: var(--shadow-subtle);
        overflow: hidden;
    }

    .card-header-clean {
        padding: 24px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8fafc; /* Sedikit latar belakang pada header */
    }

    .card-title-clean {
        font-size: 18px;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .card-subtitle {
        font-size: 14px;
        color: var(--secondary);
        margin-top: 4px;
    }

    .btn-clean {
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        color: white;
        background: var(--primary);
        border: none;
        border-radius: 10px;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-clean:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    /* --- Table Styles: Garis halus dan rapi --- */
    .table-clean {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-clean thead th {
        padding: 18px 24px;
        font-size: 13px;
        font-weight: 700;
        color: var(--secondary);
        text-transform: uppercase;
        letter-spacing: 0.7px;
        border-bottom: 2px solid #e2e8f0;
        background: #f8fafc;
        text-align: left;
    }

    .table-clean tbody td {
        padding: 18px 24px;
        font-size: 15px;
        color: #334155;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .table-clean tbody tr:last-child td {
        border-bottom: none;
    }

    .table-clean tbody tr:hover {
        background: #f8fafc;
    }

    .table-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        background: #e2e8f0;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        color: var(--secondary);
    }

    .table-title {
        font-weight: 600;
        color: var(--dark);
    }

    .table-time {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--secondary);
    }

    /* --- Comment Card: Lebih visual dan interaktif --- */
    .comment-item {
        padding: 20px 24px;
        border-bottom: 1px solid #f1f5f9;
        transition: background 0.2s;
    }

    .comment-item:last-child {
        border-bottom: none;
    }

    .comment-item:hover {
        background: #f8fafc;
    }

    .comment-avatar {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 16px;
        flex-shrink: 0;
    }

    .comment-name {
        font-size: 15px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 4px;
    }

    .comment-text {
        font-size: 14px;
        color: var(--secondary);
        line-height: 1.6;
        margin: 0;
    }

    /* Media Queries untuk Responsif */
    @media (max-width: 1200px) {
        .content-wrapper {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .hero-content {
            padding: 30px 20px;
        }
        .hero-title {
            font-size: 26px;
        }
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .stat-box {
            padding: 25px;
        }
    }
</style>

<div class="hero-card">
    <div class="hero-content">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="hero-title">
                    Halo, {{ auth()->user()->name }} 👋
                </h1>
                <p class="hero-subtitle">
                    Selamat datang di Portal Administrasi {{ $nm_desa }}. Kelola konten dan monitor aktivitas website Anda dengan efisien.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-box">
        <div class="stat-header">
            <div>
                <div class="stat-label">VISITOR HARI INI</div>
            </div>
            <div class="stat-icon" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);">
                <i class="ti ti-user-check"></i>
            </div>
        </div>
        <div class="stat-value">{{ number_format($viewsToday) }}</div>
        <div class="stat-description">Pengunjung aktif per hari ini</div>
    </div>

    <div class="stat-box">
        <div class="stat-header">
            <div>
                <div class="stat-label">TOTAL BERITA</div>
            </div>
            <div class="stat-icon" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                <i class="ti ti-edit"></i>
            </div>
        </div>
        <div class="stat-value">{{ number_format($totalBerita) }}</div>
        <div class="stat-description">Total artikel berhasil dipublikasi</div>
    </div>

    <div class="stat-box">
        <div class="stat-header">
            <div>
                <div class="stat-label">PRODUK UMKM</div>
            </div>
            <div class="stat-icon" style="background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);">
                <i class="ti ti-building-store"></i>
            </div>
        </div>
        <div class="stat-value">{{ number_format($totalProduk) }}</div>
        <div class="stat-description">Jumlah produk lokal yang terdaftar</div>
    </div>
</div>

<div class="content-wrapper">
    <div class="content-card">
        <div class="card-header-clean">
            <div>
                <h5 class="card-title-clean">Artikel Terbaru</h5>
                <p class="card-subtitle">Daftar artikel yang baru saja dipublikasi</p>
            </div>
            <a href="/admin/berita" class="btn-clean">
                Lihat Semua
                <i class="ti ti-arrow-right"></i>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table-clean">
                <thead>
                    <tr>
                        <th style="width: 8%;">No</th>
                        <th>Judul</th>
                        <th style="width: 25%;">Waktu Publikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $berita)
                    <tr>
                        <td>
                            <span class="table-number">{{ $loop->iteration }}</span>
                        </td>
                        <td>
                            <span class="table-title">{{ Str::limit($berita->judul, 70) }}</span>
                        </td>
                        <td>
                            <span class="table-time">
                                <i class="ti ti-clock" style="font-size: 16px;"></i>
                                {{ $berita->created_at->diffForHumans() }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-card">
        <div class="card-header-clean">
            <div>
                <h5 class="card-title-clean">Komentar Terbaru</h5>
                <p class="card-subtitle">Komentar pengunjung yang belum dibalas</p>
            </div>
            <a href="/admin/komentar" class="btn-clean">
                <i class="ti ti-arrow-right"></i>
            </a>
        </div>
        <div class="comment-list">
            @foreach ($komentars as $komentar)
            <div class="comment-item">
                <div class="d-flex gap-3 align-items-start">
                    <div class="comment-avatar">
                        {{ strtoupper(substr($komentar->nama, 0, 1)) }}
                    </div>
                    <div class="flex-grow-1">
                        <div class="comment-name">{{ $komentar->nama }}</div>
                        <p class="comment-text">{{ Str::limit($komentar->body, 90) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
