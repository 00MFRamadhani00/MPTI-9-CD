<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid  dashboard-content">
    <div class="row">
        <!-- ============================================================== -->
        <!-- User List Table -->
        <!-- ============================================================== -->
        <div class="col-md-12 col-sm-12 col-12">
            <div class="section-block" id="select">
                <h3 class="section-title">Tabel Daftar Kriteria</h3>
                <p>Tabel di bawah menampilkan kriteria yang digunakan dalam sistem pendukung keputusan beserta bobotnya. </p>
            </div>
            <div class="card">
                <h5 class="card-header">Daftar Kriteria</h5>
                <div class="card-body">
                    <table id="datatable1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>Pengalaman Kerja</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>15%</td>
                                </tr>
                                <tr>
                                    <td>Keterampilan Komunikasi</td>
                                    <td>15%</td>
                                </tr>
                                <tr>
                                    <td>Keterampilan Manajerial</td>
                                    <td>15%</td>
                                </tr>
                                <tr>
                                    <td>Keterampilan Teknis</td>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <td>Keterampilan Analitis</td>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <td>Ketepatan Waktu</td>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <td>Kinerja</td>
                                    <td>5%</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End User List Table -->
        <!-- ============================================================== -->
    </div>
</div>

<?= $this->endSection() ?>