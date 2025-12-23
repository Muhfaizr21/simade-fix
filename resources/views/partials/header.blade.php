<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center shadow-sm bg-white">
  <div class="container d-flex justify-content-between align-items-center">
    <!-- Logo -->
    <div class="logo">
      <a href="/">
        <img src="{{ asset('storage/' . $logo->logo) }}" alt="Logo Desa" style="height: 40px;">
      </a>
    </div>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler d-lg-none border-0" type="button">
      <i class="bi bi-list" style="font-size: 24px;"></i>
    </button>

    <!-- Navbar -->
    <nav class="navbar">
      <ul class="d-flex align-items-center gap-3 m-0 p-0">
        <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a></li>

        <li class="dropdown">
          <a href="#">Profil Desa <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="/wilayah">Wilayah</a></li>
            <li><a href="/sejarah">Sejarah</a></li>
            <li><a href="/visi-misi">Visi & Misi</a></li>
            <li><a href="/perangkat-desa">Perangkat Desa</a></li>
            <li><a href="/peta-desa">Peta Desa</a></li>
            <li><a href="/data-desa">Data Desa</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#">Informasi <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="/pengumuman">Pengumuman</a></li>
            <li><a href="/berita">Berita</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/apbdesa">APBDesa</a></li>
          </ul>
        </li>

        <li><a href="/umkm">UMKM</a></li>
        <li><a href="/layanan">Layanan</a></li>
        <li><a href="/kontak">Kontak</a></li>

        <!-- Tombol Masuk -->
        <li>
          <a href="/login" class="btn btn-primary btn-sm px-3">Masuk</a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<style>
/* Basic Reset */
body { padding-top: 70px; }

/* Header */
#header {
  padding: 10px 0;
  height: 70px;
}

/* Logo */
.logo img { max-height: 40px; }

/* Navbar - Desktop */
.navbar ul { list-style: none; }
.navbar > ul { display: flex; }

.navbar a {
  text-decoration: none;
  color: #333;
  padding: 8px 12px;
  display: block;
  font-weight: 500;
}

.navbar > ul > li > a:hover {
  color: #4f46e5;
}

/* Dropdown Desktop */
.navbar .dropdown { position: relative; }
.navbar .dropdown > ul {
  position: absolute;
  background: white;
  min-width: 200px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  border-radius: 8px;
  padding: 10px;
  display: none;
  z-index: 1000;
}

.navbar .dropdown:hover > ul {
  display: block;
}

/* Button */
.btn-primary {
  background: #4f46e5;
  border: none;
  padding: 8px 20px;
  border-radius: 20px;
}

/* ===== MOBILE ===== */
@media (max-width: 991px) {
  body { padding-top: 60px; }
  #header { height: 60px; }

  /* Navbar Mobile */
  .navbar {
    position: fixed;
    top: 60px;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0,0,0,0.3);
    display: none;
  }

  .navbar.show {
    display: block;
  }

  .navbar > ul {
    position: absolute;
    top: 0;
    right: 0;
    width: 280px;
    height: 100%;
    background: white;
    flex-direction: column;
    padding: 20px;
    margin: 0;
    overflow-y: auto;
  }

  /* Mobile Links */
  .navbar > ul > li {
    width: 100%;
    border-bottom: 1px solid #eee;
  }

  .navbar > ul > li:last-child {
    border: none;
  }

  .navbar a {
    padding: 15px 0;
  }

  /* Mobile Dropdown */
  .navbar .dropdown > ul {
    position: static;
    box-shadow: none;
    background: #f8f9fa;
    padding-left: 20px;
    display: none;
  }

  .navbar .dropdown.active > ul {
    display: block;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggleBtn = document.querySelector('.navbar-toggler');
  const navbar = document.querySelector('.navbar');
  const dropdowns = document.querySelectorAll('.dropdown > a');

  // Toggle Menu
  toggleBtn.addEventListener('click', function() {
    navbar.classList.toggle('show');
  });

  // Mobile Dropdown
  dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function(e) {
      if (window.innerWidth < 992) {
        e.preventDefault();
        const parent = this.parentElement;
        parent.classList.toggle('active');
      }
    });
  });

  // Close menu when clicking a link
  document.querySelectorAll('.navbar a').forEach(link => {
    link.addEventListener('click', function() {
      if (window.innerWidth < 992) {
        navbar.classList.remove('show');
      }
    });
  });
});
</script>
