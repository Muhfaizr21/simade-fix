<header class="app-header">
    <style>
        /* Menggunakan variabel warna dari dashboard */
        :root {
            --primary: #1e40af; /* Indigo */
            --accent: #06b6d4;  /* Cyan/Teal */
            --dark: #0f172a;
            --text-secondary: #64748b;
            /* Shadow yang baru, lebih terangkat */
            --shadow-subtle-lifted: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-dropdown: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        /* ------------------------------------------------------------------- */
        /* HEADER UTAMA (Perbaikan Dimensi) */
        /* ------------------------------------------------------------------- */
        .app-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: white;
            /* MENGGUNAKAN SHADOW BARU YANG LEBIH TEGAS */
            box-shadow: var(--shadow-subtle-lifted);
            border-bottom: 1px solid #e2e8f0;
        }

        .navbar {
            padding: 15px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        /* ------------------------------------------------------------------- */
        /* SISI KIRI: TOGGLER */
        /* ------------------------------------------------------------------- */
        .nav-link.sidebartoggler {
            font-size: 24px;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .nav-link.sidebartoggler:hover {
            background: #f1f5f9;
            color: var(--primary);
        }

        /* ------------------------------------------------------------------- */
        /* SISI KANAN: MENU USER & TOMBOL (Perbaikan Flex/Gap) */
        /* ------------------------------------------------------------------- */
        .navbar-nav.flex-row {
            /* Hapus gap di sini agar Bootstrap yang menangani spacing/margin */
            display: flex;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 0;
            /* Tambahkan spacing antara li (untuk menggantikan gap 20px) */
            /* Ini akan menyesuaikan dengan margin Bootstrap */
        }

        .navbar-nav.flex-row .nav-item {
            /* Menambahkan sedikit jarak antara item navigasi */
            margin-left: 10px;
        }

        /* Tombol 'Beranda Website' */
        .btn-primary {
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 600;
            color: white;
            background: var(--primary);
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(30, 64, 175, 0.3);
        }

        /* Avatar User */
        .nav-link.nav-icon-hover {
            padding: 0;
            border-radius: 50%;
            display: block;
            width: 40px;
            height: 40px;
            overflow: hidden;
            border: 2px solid var(--primary);
            transition: border-color 0.3s;
        }

        .nav-link.nav-icon-hover:hover {
            border-color: var(--accent);
        }

        .nav-link.nav-icon-hover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Dropdown Menu (Tidak berubah) */
        .dropdown-menu {
            border-radius: 12px;
            padding: 10px 0;
            box-shadow: var(--shadow-dropdown);
            border: 1px solid #e2e8f0;
            min-width: 180px;
        }

        /* ... (CSS Dropdown, Toggler, Media Queries lainnya tidak berubah) ... */
        .dropdown-menu .message-body { padding: 0; }
        .dropdown-item { padding: 10px 15px; font-size: 14px; color: var(--dark); text-decoration: none; transition: background 0.2s; border-radius: 0; display: flex; align-items: center; gap: 10px; }
        .dropdown-item:hover { background: #f1f5f9; color: var(--primary); }
        .dropdown-item i { font-size: 18px; color: var(--text-secondary); }
        .dropdown-item:hover i { color: var(--primary); }
        .dropdown-item p.mb-0 { font-size: 14px; font-weight: 500; margin: 0; }
        .dropdown-menu .dropdown-item.btn { background: none; text-align: left; border-radius: 0; }
        .dropdown-menu .dropdown-item.btn:hover { background: #f1f5f9; }

        @media (min-width: 1200px) {
            .nav-item.d-block.d-xl-none { display: none !important; }
        }
        @media (max-width: 1200px) {
            .nav-item.d-block.d-xl-none { display: block !important; }
        }


    </style>

    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item">
                    <a href="/" target="_blank" class="btn btn-primary">
                        <i class="ti ti-world" style="margin-right: 5px;"></i>
                        Beranda Website
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('storage/' . $foto->foto) }}" alt="Avatar" width="40" height="40" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="/admin/profil" class="dropdown-item">
                                <i class="ti ti-user"></i>
                                <p class="mb-0">Profil</p>
                            </a>

                            <a href="#" class="dropdown-item btn" onclick="event.preventDefault();
                                    Swal.fire({
                                        title: 'Konfirmasi Keluar',
                                        text: 'Apakah Anda yakin ingin keluar?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Keluar!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('logout-form').submit();
                                        }
                                    });">
                                <i class="ti ti-logout"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
