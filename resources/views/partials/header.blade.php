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
          <a href="/login"
             class="btn btn-primary btn-sm text-white px-4 py-2 rounded-pill ms-3"
             style="font-weight: 600; transition: all 0.3s ease;">
             Masuk
          </a>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- End Navbar -->

  </div>
</header>
<!-- End Header -->
