<aside class="left-sidebar">
    <style>
        /* ------------------------------------------------------------------- */
        /* SIDEBAR STYLES */
        /* ------------------------------------------------------------------- */

        /* Sidebar Styling */
        .left-sidebar {
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            /* Pastikan lebar dan posisi sidebar sudah didefinisikan di layout utama Anda */
        }

        /* Navigasi Utama */
        .sidebar-nav {
            padding: 15px 0;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Label Section */
        .nav-small-cap {
            margin: 25px 20px 10px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 11px;
            padding-left: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-small-cap i {
            font-size: 16px;
            color: #94a3b8;
        }

        /* Link Item */
        .sidebar-item {
            margin: 0 15px 6px;
        }

        .sidebar-link {
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #475569; /* Teks abu-abu default */
            font-weight: 500;
            position: relative;
        }

        .sidebar-link span i {
            font-size: 20px;
            color: #475569; /* Ikon abu-abu default */
            transition: color 0.2s;
        }

        /* Link Hover State */
        .sidebar-link:not(.active):hover {
            background: #eff6ff;
            color: var(--primary);
            box-shadow: var(--shadow-lifted);
        }

        .sidebar-link:not(.active):hover span i {
            color: var(--primary);
        }

        /* Link ACTIVE State */
        .sidebar-link.active {
            background: var(--primary);
            color: white !important;
            box-shadow: 0 4px 15px rgba(30, 64, 175, 0.4);
        }

        .sidebar-link.active span,
        .sidebar-link.active span i {
            color: white !important;
        }


        /* Dropdown/Sub-Menu Styling */
        .first-level {
            padding-left: 20px !important;
            margin-top: 5px !important;
        }

        .first-level .sidebar-item {
            margin-bottom: 3px;
        }

        .first-level .sidebar-link {
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            background: transparent;
            gap: 8px;
        }

        .first-level .sidebar-link span i {
            font-size: 14px;
            color: #475569;
        }

        /* Dropdown Link Hover */
        .first-level .sidebar-link:hover {
            background: rgba(30, 64, 175, 0.1);
            color: var(--primary);
            border-left: 3px solid var(--primary);
            transform: none;
            box-shadow: none;
        }

        .first-level .sidebar-link:hover span i {
            color: var(--primary);
        }

        /* Dropdown Collapse/Expand */
        .collapse {
            transition: all 0.3s ease-in-out;
        }

        /* Scrollbar Styling */
        .scroll-sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .scroll-sidebar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .scroll-sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .scroll-sidebar::-webkit-scrollbar-thumb:hover {
            background: #a3a3a3;
        }
    </style>

    <div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav" class="mb-0">
                <li class="nav-small-cap">
                    <i class="ti ti-home"></i>
                    <span class="hide-menu">Beranda</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link active" href="/dashboard" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
            </ul>

            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-palette"></i>
                    <span class="hide-menu">Tampilan Website</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/slider" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-photo-minus"></i>
                        </span>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/video-profile" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-brand-youtube"></i>
                        </span>
                        <span class="hide-menu">Video Profile</span>
                    </a>
                </li>
            </ul>

            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-news"></i>
                    <span class="hide-menu">Konten & Publikasi</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-world-upload"></i>
                        </span>
                        <span class="hide-menu">Profil Desa</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/wilayah" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Wilayah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/sejarah" class="sidebar-link">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Sejarah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/visi-misi" class="sidebar-link">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Visi & Misi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/perangkat-desa" class="sidebar-link">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Perangkat Desa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/peta-desa" class="sidebar-link">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Peta Desa</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-edit"></i>
                        </span>
                        <span class="hide-menu">Berita</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/berita" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Daftar Berita</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/komentar" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Komentar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/kategori" class="sidebar-link">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Kategori</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-chart-bar"></i>
                        </span>
                        <span class="hide-menu">Data Kependudukan</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/agama" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Agama</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/jenis-kelamin" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Jenis Kelamin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/pekerjaan" class="sidebar-link">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Pekerjaan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-info-circle"></i>
                        </span>
                        <span class="hide-menu">Informasi & Layanan</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/umkm" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">UMKM Desa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/layanan" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Layanan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/gallery" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Gallery</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/pengumuman" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">Pengumuman</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/apbdes" aria-expanded="false">
                                <span class="d-flex"><i class="ti ti-point"></i></span>
                                <span class="hide-menu">APBDes</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/kontak" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-mail-forward"></i>
                        </span>
                        <span class="hide-menu">Kontak</span>
                    </a>
                </li>
            </ul>

            <ul id="sidebarnav" class="pb-5">
                <li class="nav-small-cap">
                    <i class="ti ti-settings"></i>
                    <span class="hide-menu">Sistem</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/identitas-situs" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-brand-laravel"></i>
                        </span>
                        <span class="hide-menu">Identitas Situs</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/profil" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Profil Akun</span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </aside>
