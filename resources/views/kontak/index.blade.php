@extends('layouts.main')

@section('content')
<!-- ======= Contact Us Section ======= -->
<section id="contact" class="contact py-5" style="background:#f8f9fa;">
    <div class="container" data-aos="fade-up">

        <div class="section-title text-center mb-5">
            <h2>Kontak Kami</h2>
            <p>Dapatkan informasi lengkap dan layanan melalui kontak resmi kami</p>
        </div>

        <div class="row g-4">

            <!-- Lokasi Desa -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body p-3">
                        <div class="text-center mb-3">
                            <i class="bx bx-map" style="font-size:40px;color:#007bff;"></i>
                            <h5 class="mt-2">Lokasi Desa</h5>
                        </div>
                        <div class="overflow-hidden rounded">
                            <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=520&amp;height=402&amp;hl=en&amp;q={{ urlencode($kontak->lokasi) }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak Lainnya -->
            <div class="col-lg-6 d-flex flex-column gap-4">

                <!-- Email -->
                <div class="card shadow-sm border-0 h-100 hover-card">
                    <div class="card-body text-center py-4">
                        <i class="bx bx-envelope" style="font-size:36px;color:#28a745;"></i>
                        <h5 class="mt-3">Email Kami</h5>
                        <p class="mb-0">{{ $kontak->email }}</p>
                    </div>
                </div>

                <!-- Nomor HP -->
                <div class="card shadow-sm border-0 h-100 hover-card">
                    <div class="card-body text-center py-4">
                        <i class="bx bx-phone-call" style="font-size:36px;color:#ffc107;"></i>
                        <h5 class="mt-3">Nomor HP Kami</h5>
                        <p class="mb-0">{{ $kontak->no_hp }}</p>
                    </div>
                </div>

                <!-- Mobile Apps -->
                <div class="card shadow-lg border-0 h-100" style="background: linear-gradient(135deg,#007bff,#00c6ff); color:white;">
                    <div class="card-body text-center py-4">
                        <i class="bx bx-mobile-vibration" style="font-size:36px;"></i>
                        <h5 class="mt-3">Tersedia di Mobile Apps</h5>
                        <p class="mb-0">Download sekarang di App Store & Google Play</p>
                        <div class="mt-3 d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-light btn-sm rounded-pill">App Store</a>
                            <a href="#" class="btn btn-light btn-sm rounded-pill">Google Play</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.25);
}
</style>
@endsection
