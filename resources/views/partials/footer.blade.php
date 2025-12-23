<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 footer-info">
            <img src="{{ asset('storage/' . $logo->logo) }}" class="mb-2" alt="Logo" width="250">
            <h3>{{ $nm_desa }}</h3>
            <p>
              Kecamatan {{ $kecamatan }}, Kabupaten {{ $kabupaten }}, <br> Provinsi {{ $provinsi }}, Kode Pos {{ $kode_pos }}<br><br>
              <strong>Nomor HP :</strong> {{ $no_hp }}<br>
              <strong>Email :</strong> {{ $email }}<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="/">Beranda</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/berita">Berita</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/umkm">Umkm</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/data-desa">Data Desa</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/kontak">Kontak Kami</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Profil Desa</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="/wilayah">Wilayah</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/sejarah">Sejarah</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/visi-misi">Visi & Misi</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/perangkat-desa">Perangkat Desa</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/peta-desa">Peta Desa</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>2025</span></strong>. || Repost By : SIMADE
      </div>
    </div>
</footer><!-- End Footer -->

<style>
/* === Footer Modern === */
#footer {
  background: #0f172a;
  color: #e2e8f0;
  padding-top: 60px;
}

/* Footer Top */
.footer-top {
  padding-bottom: 40px;
}

/* Footer Info */
.footer-info img {
  max-width: 100%;
  height: auto;
  margin-bottom: 15px;
}

.footer-info h3 {
  font-size: 24px;
  font-weight: 700;
  color: white;
  margin: 15px 0 10px;
}

.footer-info p {
  font-size: 15px;
  line-height: 1.6;
  color: #cbd5e1;
}

.footer-info strong {
  color: white;
  min-width: 100px;
  display: inline-block;
}

/* Footer Links */
.footer-links h4 {
  font-size: 18px;
  font-weight: 700;
  color: white;
  margin-bottom: 20px;
  padding-bottom: 8px;
  border-bottom: 2px solid #4f46e5;
  display: inline-block;
}

.footer-links ul {
  list-style: none;
  padding: 0;
}

.footer-links ul li {
  margin-bottom: 10px;
  display: flex;
  align-items: center;
}

.footer-links ul li i {
  color: #4f46e5;
  margin-right: 8px;
  font-size: 12px;
}

.footer-links ul li a {
  color: #cbd5e1;
  text-decoration: none;
  transition: 0.3s;
}

.footer-links ul li a:hover {
  color: white;
  padding-left: 5px;
}

/* Copyright */
.copyright {
  text-align: center;
  padding: 25px 0;
  border-top: 1px solid #334155;
  color: #94a3b8;
  font-size: 14px;
}

.copyright strong {
  color: white;
}

.copyright span {
  color: #4f46e5;
}

/* Responsive */
@media (max-width: 991px) {
  .footer-info,
  .footer-links {
    margin-bottom: 30px;
  }
}

@media (max-width: 768px) {
  .footer-info h3 {
    font-size: 20px;
  }

  .footer-info p {
    font-size: 14px;
  }
}
</style>
