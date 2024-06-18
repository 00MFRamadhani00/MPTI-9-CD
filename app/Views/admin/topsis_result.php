<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12">
            <!-- ============================================================== -->
            <!-- Select Options  -->
            <!-- ============================================================== -->
            <h1>Hasil Perhitungan TOPSIS</h1>
            <?php foreach($nama_karyawan_terpilih as $karyawan): ?>
            <p>Karyawan Terpilih: <?= $karyawan->nama_lengkap ?></p>
            <?php endforeach ?>
            <p>Hasil Poin Kalkulasi: <?= $hasil_poin_kalkulasi ?></p>
            <!-- ============================================================== -->
            <!-- End Select Options  -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>


<?= $this->endSection() ?>