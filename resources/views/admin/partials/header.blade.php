<header class="app-header">
    <style>
        :root {
            --primary: #1e40af;
            --accent: #06b6d4;
            --dark: #0f172a;
            --text-secondary: #64748b;
            --shadow-subtle-lifted: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-dropdown: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                                0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        /* ==========================================================
           HEADER UTAMA
        ========================================================== */
        .app-header {
            position: sticky;
            top: 0;
            z-index: 200;
            background: white;
            box-shadow: var(--shadow-subtle-lifted);
            border-bottom: 1px solid #e2e8f0;
        }

        .navbar {
            padding: 14px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        /* ==========================================================
           Toggler (Mobile Sidebar)
        ========================================================== */
        .toggler-btn {
            width: 42px;
            height: 42px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.2s;
            background: #f8fafc;
        }

        .toggler-btn:hover {
            background: #eef2ff;
        }

        .toggler-btn svg {
            width: 24px;
            height: 24px;
            stroke: var(--text-secondary);
        }

        /* ==========================================================
           KANAN: Tombol + Avatar
        ========================================================== */
        .navbar-nav.flex-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 0;
            padding: 0;
        }

        /* Tombol Website */
        .btn-primary {
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 600;
            color: white;
            background: var(--primary);
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(30, 64, 175, 0.3);
        }

        .btn-primary svg {
            width: 18px;
            height: 18px;
            stroke: #fff;
        }

        /* Avatar */
        .avatar-wrap {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--primary);
            cursor: pointer;
            transition: 0.2s;
        }

        .avatar-wrap:hover {
            border-color: var(--accent);
        }

        .avatar-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ==========================================================
           DROPDOWN MENU
        ========================================================== */
        .dropdown-menu {
            border-radius: 12px;
            padding: 10px 0;
            box-shadow: var(--shadow-dropdown);
            min-width: 180px;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            font-size: 14px;
            color: var(--dark);
            transition: 0.2s;
        }

        .dropdown-item:hover {
            background: #f1f5f9;
            color: var(--primary);
        }

        .dropdown-item svg {
            width: 18px;
            height: 18px;
            stroke: var(--text-secondary);
        }

        .dropdown-item:hover svg {
            stroke: var(--primary);
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light">
        <!-- ==================================================
             KIRI: TOGGLER
        ================================================== -->
        <div class="d-block d-xl-none toggler-btn" id="headerCollapse">
            <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6h18M3 12h18M3 18h18" />
            </svg>
        </div>

        <!-- ==================================================
             KANAN
        ================================================== -->
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row align-items-center">

                <!-- Tombol Website -->
                <li class="nav-item">
                    <a href="/" target="_blank" class="btn btn-primary">
                        <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20"></path>
                        </svg>
                        Beranda Website
                    </a>
                </li>

                <!-- Avatar + Dropdown -->
                <li class="nav-item dropdown">
                    <div id="drop2" class="avatar-wrap" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('storage/' . $foto->foto) }}" alt="Avatar">
                    </div>

                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">

                        <a href="/admin/profil" class="dropdown-item">
                            <svg fill="none" stroke-width="2"><path d="M12 12c2.7 0 4.5-2 4.5-4.5S14.7 3 12 3s-4.5 2-4.5 4.5S9.3 12 12 12zm0 3c-4 0-7 2-7 4.5V21h14v-1.5c0-2.5-3-4.5-7-4.5z"/></svg>
                            Profil
                        </a>

                        <a href="#" class="dropdown-item"
                           onclick="event.preventDefault();
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
                            <svg fill="none" stroke-width="2"><path d="M15 3h4v18h-4M10 17l5-5-5-5M15 12H3" /></svg>
                            Keluar
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
