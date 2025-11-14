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
              <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/berita">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/umkm">Umkm</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/data-desa">Data Desa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/kontak">Kontak Kami</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Profil Desa</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/wilayah">Wilayah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/sejarah">Sejarah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/visi-misi">Visi & Misi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/perangkat-desa">Perangkat Desa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/peta-desa">Peta Desa</a></li>
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
  background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
  color: #e2e8f0;
  position: relative;
  overflow: hidden;
}

#footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(79, 70, 229, 0.5), transparent);
}

/* Footer Top */
.footer-top {
  padding: 80px 0 40px;
  position: relative;
}

/* Footer Info */
.footer-info img {
  max-width: 100%;
  height: auto;
  filter: brightness(0) invert(1);
  opacity: 0.95;
  transition: all 0.3s ease;
}

.footer-info img:hover {
  opacity: 1;
  transform: scale(1.02);
}

.footer-info h3 {
  font-size: 28px;
  font-weight: 800;
  color: white;
  margin: 20px 0 15px;
  letter-spacing: -0.5px;
}

.footer-info p {
  font-size: 15px;
  line-height: 1.8;
  color: #cbd5e1;
  margin-bottom: 0;
}

.footer-info strong {
  color: white;
  font-weight: 700;
  display: inline-block;
  min-width: 110px;
}

/* Footer Links */
.footer-links h4 {
  font-size: 18px;
  font-weight: 700;
  color: white;
  margin-bottom: 25px;
  position: relative;
  padding-bottom: 12px;
}

.footer-links h4::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 50px;
  height: 3px;
  background: linear-gradient(90deg, #4f46e5, #10b981);
  border-radius: 2px;
}

.footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links ul li {
  padding: 0;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  transition: all 0.3s ease;
}

.footer-links ul li:hover {
  transform: translateX(5px);
}

.footer-links ul li i {
  font-size: 20px;
  color: #4f46e5;
  margin-right: 8px;
  transition: all 0.3s ease;
}

.footer-links ul li:hover i {
  color: #10b981;
}

.footer-links ul li a {
  color: #cbd5e1;
  text-decoration: none;
  font-size: 15px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.footer-links ul li:hover a {
  color: white;
}

/* Copyright */
.copyright {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding: 30px 0;
  text-align: center;
  margin-top: 40px;
}

.copyright {
  font-size: 14px;
  color: #94a3b8;
  font-weight: 500;
}

.copyright strong {
  color: white;
  font-weight: 700;
}

.copyright span {
  color: #4f46e5;
  font-weight: 700;
}

/* Decorative Elements */
#footer::after {
  content: '';
  position: absolute;
  bottom: 0;
  right: -100px;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(79, 70, 229, 0.1), transparent);
  border-radius: 50%;
  pointer-events: none;
}

/* === Responsive === */
@media (max-width: 991px) {
  .footer-top {
    padding: 60px 0 30px;
  }

  .footer-info {
    margin-bottom: 40px;
  }

  .footer-info h3 {
    font-size: 24px;
  }

  .footer-links {
    margin-bottom: 30px;
  }
}

@media (max-width: 767px) {
  .footer-top {
    padding: 50px 0 20px;
  }

  .footer-info img {
    width: 200px;
  }

  .footer-info h3 {
    font-size: 22px;
    margin: 15px 0 12px;
  }

  .footer-info p {
    font-size: 14px;
  }

  .footer-links h4 {
    font-size: 17px;
    margin-bottom: 20px;
  }

  .footer-links ul li {
    margin-bottom: 10px;
  }

  .footer-links ul li a {
    font-size: 14px;
  }

  .copyright {
    padding: 25px 0;
    margin-top: 30px;
    font-size: 13px;
  }
}

@media (max-width: 575px) {
  .footer-top {
    padding: 40px 0 20px;
  }

  .footer-info img {
    width: 180px;
  }

  .footer-info h3 {
    font-size: 20px;
  }

  .copyright {
    padding: 20px 0;
    line-height: 1.8;
  }
}

/* Smooth Scroll Top */
.back-to-top {
  position: fixed;
  right: 30px;
  bottom: 30px;
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, #4f46e5, #6366f1);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  z-index: 999;
  box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
}

.back-to-top.show {
  opacity: 1;
  visibility: visible;
}

.back-to-top:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
}

@media (max-width: 768px) {
  .back-to-top {
    right: 20px;
    bottom: 20px;
    width: 45px;
    height: 45px;
    font-size: 20px;
  }
}
</style>

<script>
// Back to Top Button
document.addEventListener('DOMContentLoaded', function() {
  // Create back to top button
  const backToTop = document.createElement('div');
  backToTop.className = 'back-to-top';
  backToTop.innerHTML = '<i class="bi bi-arrow-up"></i>';
  document.body.appendChild(backToTop);

  // Show/hide on scroll
  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 300) {
      backToTop.classList.add('show');
    } else {
      backToTop.classList.remove('show');
    }
  });

  // Scroll to top on click
  backToTop.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});
</script>
