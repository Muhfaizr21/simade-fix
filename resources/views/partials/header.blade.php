<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center shadow-sm bg-white">
  <div class="container d-flex justify-content-between align-items-center">
    <!-- Logo -->
    <div class="logo me-auto">
      <a href="/">
        <img src="{{ asset('storage/' . $logo->logo) }}" alt="Logo Desa" class="img-fluid" style="max-height: 55px;">
      </a>
    </div>
    <!-- Navbar -->
    <nav id="navbar" class="navbar">
      <ul class="d-flex align-items-center gap-3">
        <li>
          <a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
        </li>
        <li class="dropdown">
          <a href="#"><span>Profil Desa</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="{{ Request::is('wilayah') ? 'active' : '' }}" href="/wilayah">Wilayah</a></li>
            <li><a class="{{ Request::is('sejarah') ? 'active' : '' }}" href="/sejarah">Sejarah</a></li>
            <li><a class="{{ Request::is('visi-misi') ? 'active' : '' }}" href="/visi-misi">Visi & Misi</a></li>
            <li><a class="{{ Request::is('perangkat-desa') ? 'active' : '' }}" href="/perangkat-desa">Perangkat Desa</a></li>
            <li><a class="{{ Request::is('peta-desa') ? 'active' : '' }}" href="/peta-desa">Peta Desa</a></li>
            <li><a class="{{ Request::is('data-desa') ? 'active' : '' }}" href="/data-desa">Data Desa</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="{{ Request::is('pengumuman') ? 'active' : '' }}" href="/pengumuman">Pengumuman</a></li>
            <li><a class="{{ Request::is('berita') ? 'active' : '' }}" href="/berita">Berita</a></li>
            <li><a class="{{ Request::is('gallery') ? 'active' : '' }}" href="/gallery">Gallery</a></li>
            <li><a class="{{ Request::is('apbdesa') ? 'active' : '' }}" href="/apbdesa">APBDesa</a></li>
          </ul>
        </li>
        <li>
          <a class="nav-link scrollto {{ Request::is('umkm') ? 'active' : '' }}" href="/umkm">UMKM</a>
        </li>
        <li>
          <a class="nav-link scrollto {{ Request::is('layanan') ? 'active' : '' }}" href="/layanan">Layanan</a>
        </li>
        <li>
          <a class="nav-link scrollto {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
        </li>
        <!-- Tombol Masuk -->
        <li>
          <a href="/login" class="btn btn-primary btn-sm text-white px-4 py-2 rounded-pill ms-3" style="font-weight: 600; transition: all 0.3s ease;">
            Masuk
          </a>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- End Navbar -->
  </div>
</header>
<!-- End Header -->

<style>
/* === Header Styling === */
#header {
  background: white !important;
  box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08) !important;
  padding: 10px 0;
  transition: all 0.3s ease;
}

#header .container {
  max-width: 1320px;
}

/* Logo Styling */
.logo a {
  display: flex;
  align-items: center;
}

.logo img {
  transition: transform 0.3s ease;
}

.logo a:hover img {
  transform: scale(1.05);
}

/* Navbar Styling */
.navbar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.navbar li {
  position: relative;
}

/* Nav Links */
.navbar .nav-link {
  display: block;
  padding: 10px 18px;
  color: #334155;
  font-weight: 600;
  font-size: 15px;
  text-decoration: none;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.navbar .nav-link:hover {
  color: #4f46e5;
  background: rgba(79, 70, 229, 0.08);
}

.navbar .nav-link.active {
  color: #4f46e5;
  background: rgba(79, 70, 229, 0.12);
}

/* Dropdown Parent */
.navbar .dropdown > a {
  display: flex;
  align-items: center;
  padding: 10px 18px;
  color: #334155;
  font-weight: 600;
  font-size: 15px;
  text-decoration: none;
  border-radius: 8px;
  transition: all 0.3s ease;
  cursor: pointer;
}

.navbar .dropdown > a:hover {
  color: #4f46e5;
  background: rgba(79, 70, 229, 0.08);
}

.navbar .dropdown > a i {
  margin-left: 6px;
  font-size: 12px;
  transition: transform 0.3s ease;
}

.navbar .dropdown:hover > a i {
  transform: rotate(180deg);
}

/* Dropdown Menu */
.navbar .dropdown ul {
  position: absolute;
  top: calc(100% + 10px);
  left: 0;
  min-width: 220px;
  background: white;
  border-radius: 12px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
  padding: 8px;
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all 0.3s ease;
  z-index: 99;
}

.navbar .dropdown:hover > ul {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.navbar .dropdown ul li {
  margin: 0;
}

.navbar .dropdown ul a {
  display: block;
  padding: 12px 18px;
  color: #334155;
  font-weight: 600;
  font-size: 14px;
  text-decoration: none;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.navbar .dropdown ul a:hover {
  background: rgba(79, 70, 229, 0.08);
  color: #4f46e5;
  padding-left: 24px;
}

.navbar .dropdown ul a.active {
  background: rgba(79, 70, 229, 0.12);
  color: #4f46e5;
}

/* Button Masuk Styling */
.navbar .btn-primary {
  background: linear-gradient(135deg, #4f46e5, #6366f1) !important;
  border: none !important;
  box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
  font-weight: 700 !important;
  letter-spacing: 0.3px;
}

.navbar .btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4) !important;
}

/* Mobile Nav Toggle */
.mobile-nav-toggle {
  color: #334155;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: all 0.3s;
  margin-left: 20px;
}

.mobile-nav-toggle:hover {
  color: #4f46e5;
}

/* Scrolled Header Effect */
#header.header-scrolled {
  box-shadow: 0 4px 25px rgba(0, 0, 0, 0.12) !important;
}

/* === Responsive === */
@media (max-width: 1200px) {
  .navbar .nav-link,
  .navbar .dropdown > a {
    padding: 10px 14px;
    font-size: 14px;
  }

  .navbar ul {
    gap: 8px !important;
  }
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    position: fixed;
    top: 70px;
    right: -100%;
    width: 300px;
    max-width: 85%;
    height: calc(100vh - 70px);
    background: white;
    flex-direction: column !important;
    align-items: flex-start !important;
    padding: 30px 20px;
    gap: 0 !important;
    box-shadow: -5px 0 30px rgba(0, 0, 0, 0.15);
    overflow-y: auto;
    transition: right 0.4s ease;
    z-index: 9999;
  }

  .navbar ul.show {
    right: 0;
  }

  .navbar li {
    width: 100%;
    border-bottom: 1px solid #e2e8f0;
    padding: 0;
  }

  .navbar li:last-child {
    border-bottom: none;
  }

  .navbar .nav-link,
  .navbar .dropdown > a {
    width: 100%;
    padding: 15px 0;
    border-radius: 0;
  }

  /* Dropdown Mobile */
  .navbar .dropdown ul {
    position: static;
    width: 100%;
    opacity: 1;
    visibility: visible;
    transform: none;
    box-shadow: none;
    background: #f8fafc;
    margin-top: 10px;
    display: none;
    padding: 10px;
  }

  .navbar .dropdown.dropdown-active ul {
    display: block;
  }

  .navbar .dropdown ul a:hover {
    padding-left: 18px;
  }

  /* Button Masuk Mobile */
  .navbar .btn-primary {
    width: 100%;
    text-align: center;
    margin-left: 0 !important;
    margin-top: 20px;
    padding: 14px 24px !important;
  }

  /* Mobile Menu Overlay */
  body.mobile-nav-active::before {
    content: '';
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
  }
}

@media (max-width: 575px) {
  .navbar ul {
    width: 280px;
    padding: 25px 15px;
  }

  .logo img {
    max-height: 45px !important;
  }
}
</style>

<script>
// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', function() {
  const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
  const navbar = document.querySelector('#navbar ul');
  const body = document.body;

  if (mobileNavToggle) {
    mobileNavToggle.addEventListener('click', function() {
      navbar.classList.toggle('show');
      body.classList.toggle('mobile-nav-active');

      // Toggle icon
      if (this.classList.contains('bi-list')) {
        this.classList.remove('bi-list');
        this.classList.add('bi-x');
      } else {
        this.classList.remove('bi-x');
        this.classList.add('bi-list');
      }
    });
  }

  // Close menu when clicking on a link
  const navLinks = document.querySelectorAll('#navbar a');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      if (navbar.classList.contains('show')) {
        navbar.classList.remove('show');
        body.classList.remove('mobile-nav-active');
        mobileNavToggle.classList.remove('bi-x');
        mobileNavToggle.classList.add('bi-list');
      }
    });
  });

  // Dropdown toggle for mobile
  const dropdowns = document.querySelectorAll('.navbar .dropdown > a');
  dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function(e) {
      if (window.innerWidth < 991) {
        e.preventDefault();
        const parent = this.parentElement;
        parent.classList.toggle('dropdown-active');
      }
    });
  });

  // Header scroll effect
  window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
      header.classList.add('header-scrolled');
    } else {
      header.classList.remove('header-scrolled');
    }
  });

  // Close menu on click outside
  document.addEventListener('click', function(e) {
    if (!e.target.closest('#navbar') && !e.target.closest('.mobile-nav-toggle')) {
      if (navbar.classList.contains('show')) {
        navbar.classList.remove('show');
        body.classList.remove('mobile-nav-active');
        mobileNavToggle.classList.remove('bi-x');
        mobileNavToggle.classList.add('bi-list');
      }
    }
  });
});
</script>
