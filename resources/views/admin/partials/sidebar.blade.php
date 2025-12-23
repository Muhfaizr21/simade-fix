<aside class="left-sidebar">
    <style>
        /* ------------------------------------------------------------------- */
        /* SIDEBAR STYLES */
        /* ------------------------------------------------------------------- */

        /* Sidebar Container */
        .left-sidebar {
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            z-index: 1000;
            overflow-y: auto;
        }

        /* Scrollbar */
        .scroll-sidebar {
            height: calc(100vh - 20px);
            padding-bottom: 20px;
        }

        /* Navigasi */
        .sidebar-nav {
            padding: 15px 0;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
        }

        /* Section Label */
        .nav-small-cap {
            margin: 25px 20px 10px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 11px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-small-cap i {
            font-size: 14px;
            color: #94a3b8;
        }

        /* Menu Items */
        .sidebar-item {
            margin: 0 10px 5px;
        }

        .sidebar-link {
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #475569;
            font-weight: 500;
            font-size: 14px;
        }

        .sidebar-link span i {
            font-size: 18px;
            width: 20px;
            text-align: center;
            color: #64748b;
        }

        /* Hover State */
        .sidebar-link:hover {
            background: #f1f5f9;
            color: #1e40af;
        }

        .sidebar-link:hover span i {
            color: #1e40af;
        }

        /* Active State */
        .sidebar-link.active {
            background: #1e40af;
            color: white !important;
        }

        .sidebar-link.active span i {
            color: white !important;
        }

        /* Dropdown */
        .has-arrow {
            position: relative;
        }

        .has-arrow::after {
            content: '\f282';
            font-family: "bootstrap-icons";
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            transition: transform 0.3s;
        }

        /* Submenu */
        .first-level {
            padding-left: 20px !important;
            margin-top: 5px;
        }

        .first-level .sidebar-item {
            margin-bottom: 3px;
        }

        .first-level .sidebar-link {
            padding: 8px 12px;
            font-size: 13px;
            background: transparent;
        }

        .first-level .sidebar-link span i {
            font-size: 12px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .left-sidebar {
                width: 70px;
                overflow: visible;
            }

            .left-sidebar:hover {
                width: 260px;
            }

            .hide-menu {
                display: none;
            }

            .left-sidebar:hover .hide-menu {
                display: inline;
            }

            .nav-small-cap {
                display: none;
            }

            .left-sidebar:hover .nav-small-cap {
                display: flex;
            }

            .has-arrow::after {
                display: none;
            }

            .left-sidebar:hover .has-arrow::after {
                display: block;
            }
        }
    </style>

    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <!-- Dashboard -->
            <ul>
                <li class="nav-small-cap">
                    <i class="bi bi-house"></i>
                    <span class="hide-menu">Beranda</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link active" href="/dashboard">
                        <span><i class="bi bi-speedometer2"></i></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
            </ul>

            <!-- Tampilan Website -->
            <ul>
                <li class="nav-small-cap">
                    <i class="bi bi-palette"></i>
                    <span class="hide-menu">Tampilan Website</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/slider">
                        <span><i class="bi bi-images"></i></span>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/video-profile">
                        <span><i class="bi bi-youtube"></i></span>
                        <span class="hide-menu">Video Profile</span>
                    </a>
                </li>
            </ul>

            <!-- Konten & Publikasi -->
            <ul>
                <li class="nav-small-cap">
                    <i class="bi bi-newspaper"></i>
                    <span class="hide-menu">Konten & Publikasi</span>
                </li>

                <!-- Profil Desa -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#">
                        <span><i class="bi bi-globe"></i></span>
                        <span class="hide-menu">Profil Desa</span>
                    </a>
                    <ul class="first-level collapse">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/wilayah">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Wilayah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/sejarah">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Sejarah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/visi-misi">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Visi & Misi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/perangkat-desa">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Perangkat Desa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/peta-desa">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Peta Desa</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Berita -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#">
                        <span><i class="bi bi-file-text"></i></span>
                        <span class="hide-menu">Berita</span>
                    </a>
                    <ul class="first-level collapse">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/berita">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Daftar Berita</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/komentar">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Komentar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/kategori">
                                <span><i class="bi bi-circle"></i></span>
                                <span class="hide-menu">Kategori</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Informasi & Layanan -->
            <ul>
                <li class="nav-small-cap">
                    <i class="bi bi-info-circle"></i>
                    <span class="hide-menu">Informasi & Layanan</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/umkm">
                        <span><i class="bi bi-shop"></i></span>
                        <span class="hide-menu">UMKM Desa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/layanan">
                        <span><i class="bi bi-gear"></i></span>
                        <span class="hide-menu">Layanan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/gallery">
                        <span><i class="bi bi-camera"></i></span>
                        <span class="hide-menu">Gallery</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/pengumuman">
                        <span><i class="bi bi-megaphone"></i></span>
                        <span class="hide-menu">Pengumuman</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/apbdes">
                        <span><i class="bi bi-cash-stack"></i></span>
                        <span class="hide-menu">APBDes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/kontak">
                        <span><i class="bi bi-envelope"></i></span>
                        <span class="hide-menu">Kontak</span>
                    </a>
                </li>
            </ul>

            <!-- Sistem -->
            <ul>
                <li class="nav-small-cap">
                    <i class="bi bi-gear"></i>
                    <span class="hide-menu">Sistem</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/identitas-situs">
                        <span><i class="bi bi-globe2"></i></span>
                        <span class="hide-menu">Identitas Situs</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/profil">
                        <span><i class="bi bi-person"></i></span>
                        <span class="hide-menu">Profil Akun</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script>
// Dropdown Toggle
document.querySelectorAll('.sidebar-link.has-arrow').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const submenu = this.nextElementSibling;
        submenu.classList.toggle('show');

        // Rotate arrow
        const arrow = this.querySelector('.bi-chevron-down');
        if (arrow) {
            arrow.classList.toggle('rotate-180');
        }
    });
});

// Mobile sidebar toggle
const sidebar = document.querySelector('.left-sidebar');
if (window.innerWidth <= 768) {
    sidebar.addEventListener('mouseenter', function() {
        this.classList.add('expanded');
    });

    sidebar.addEventListener('mouseleave', function() {
        this.classList.remove('expanded');
    });
}
</script>
