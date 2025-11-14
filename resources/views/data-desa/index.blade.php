@extends('layouts.main')

@section('content')

<!-- =======================
     HERO MODERN GRADIENT
======================= -->
<section class="page-hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content-page">
            <h1 class="page-title">Statistik Kependudukan</h1>
            <p class="page-subtitle">Data demografis Desa Dongkal dalam visual dan tabel</p>
        </div>
    </div>
</section>

<!-- =======================
     CONTENT SECTION
======================= -->
<section class="content-section">
    <div class="container">

        <!-- =======================
            DATA AGAMA
        ======================== -->
        <div class="row my-4">
            <div class="section-title-modern">
                <h2>Data Agama</h2>
            </div>

            <!-- TABEL -->
            <div class="col-lg-4">
                <div class="card modern-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Agama</th>
                                        <th>Penganut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataAgamas as $agama)
                                    <tr>
                                        <td>{{ $agama->agama }}</td>
                                        <td>{{ $agama->penganut }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total</td>
                                        <td>{{ $totalPenganut }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHART -->
            <div class="col-lg-8">
                <div class="card modern-card">
                    <div class="card-body">
                        <canvas id="agamaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- =======================
            DATA JENIS KELAMIN
        ======================== -->
        <div class="row my-4">
            <div class="section-title-modern">
                <h2>Data Jenis Kelamin</h2>
            </div>

            <!-- TABEL -->
            <div class="col-lg-4">
                <div class="card modern-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataJenisKelamins as $dataJenisKelamin)
                                    <tr>
                                        <td>{{ $dataJenisKelamin->jenis_kelamin }}</td>
                                        <td>{{ $dataJenisKelamin->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total</td>
                                        <td>{{ $jumlahTotal }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHART -->
            <div class="col-lg-8">
                <div class="card modern-card">
                    <div class="card-body">
                        <canvas id="jenisKelaminChart" style="max-height: 400px; overflow: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- =======================
            DATA PEKERJAAN
        ======================== -->
        <div class="row my-4">
            <div class="section-title-modern">
                <h2>Data Pekerjaan</h2>
            </div>

            <!-- TABEL -->
            <div class="col-lg-4">
                <div class="card modern-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaans as $pekerjaan)
                                    <tr>
                                        <td>{{ $pekerjaan->pekerjaan }}</td>
                                        <td>{{ $pekerjaan->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total</td>
                                        <td>{{ $totalPekerjaan }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHART -->
            <div class="col-lg-8">
                <div class="card modern-card">
                    <div class="card-body">
                        <canvas id="pekerjaanChart" style="max-height: 400px; overflow: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- =======================
     CHART SCRIPTS
======================= -->

<script>
    const ctxAgama = document.getElementById('agamaChart');
    const labels = {!! $labels !!};
    const dataPenganut = {!! $dataPenganut !!};

    new Chart(ctxAgama, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Penganut Agama',
                data: dataPenganut,
                backgroundColor: [
                    'rgba(255, 99, 132, .2)',
                    'rgba(255, 159, 64, .2)',
                    'rgba(255, 205, 86, .2)',
                    'rgba(75, 192, 192, .2)',
                    'rgba(54, 162, 235, .2)',
                    'rgba(153, 102, 255, .2)',
                    'rgba(201, 203, 207, .2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });
</script>

<script>
    const ctxJenisKelamin = document.getElementById('jenisKelaminChart');
    const labelsJenisKelamin = {!! $labelsJenisKelamin !!};
    const jumlah = {!! $jumlah !!};

    new Chart(ctxJenisKelamin, {
        type: 'pie',
        data: {
            labels: labelsJenisKelamin,
            datasets: [{
                label: 'Jumlah Jenis Kelamin',
                data: jumlah,
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)'
                ],
                hoverOffset: 4
            }]
        }
    });
</script>

<script>
    const ctxPekerjaan = document.getElementById('pekerjaanChart');
    const labelPekerjaan  = {!! $labelPekerjaan !!};
    const dataPekerjaan   = {!! $jumlahPekerjaan !!};

    new Chart(ctxPekerjaan, {
        type: 'polarArea',
        data: {
            labels: labelPekerjaan,
            datasets: [{
                label: 'Jumlah Pekerjaan',
                data: dataPekerjaan,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4
            }]
        }
    });
</script>


<!-- =======================
     CSS MODERN THEME
======================= -->
<style>

.page-hero {
    position: relative;
    padding: 120px 0 70px;
    background: linear-gradient(135deg, #4f46e5, #10b981);
    text-align: center;
    color: white;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 50%, rgba(255,255,255,.12), transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255,255,255,.12), transparent 50%);
}

.hero-content-page { position: relative; z-index: 2; }

.page-title {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 10px;
}

.page-subtitle {
    font-size: 18px;
    opacity: .85;
}


.content-section {
    padding: 70px 0;
    background: #f8fafc;
}

.section-title-modern h2 {
    font-size: 30px;
    font-weight: 800;
    border-bottom: 4px solid #4f46e5;
    display: inline-block;
    padding-bottom: 8px;
    margin-bottom: 20px;
    color: #1e293b;
}

.modern-card {
    border-radius: 20px;
    border: 1px solid rgba(0,0,0,0.06);
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

.modern-card .card-body {
    padding: 30px;
}

.table thead {
    background: linear-gradient(135deg, #4f46e5, #10b981);
    color: white;
}

.table tbody tr:hover {
    background: #f1f5f9;
}

.table-warning {
    background: rgba(255,193,7,.2);
}

@media(max-width:768px) {
    .page-title { font-size: 32px; }
}

</style>

@endsection
