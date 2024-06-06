<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12">
            <!-- ============================================================== -->
            <!-- Select Options  -->
            <!-- ============================================================== -->
            <h1>Hasil Perhitungan TOPSIS</h1>
            <p>Karyawan Terpilih: <?= $nama_karyawan_terpilih ?></p>
            <p>Hasil Poin Kalkulasi: <?= $hasil_poin_kalkulasi ?></p>
            <!-- ============================================================== -->
            <!-- End Select Options  -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>


<?= $this->endSection() ?>