<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12">
            <!-- ============================================================== -->
            <!-- Select Options  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="select">
                        <h3 class="section-title">Perhitungan Poin Menggunakan Metode TOPSIS</h3>
                        <p>Silahkan pilih karyawan dan poin kriteria masing-masing, yang kemudian akan dikalkulasi menggunakan metode TOPSIS.</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulir Kalkulasi</h5>
                        <div class="card-body">
                        <form action="<?= base_url('/calculate-topsis') ?>" method="post">
                            <div class="form-group">
                                <label class="col-form-label">Pilih Karyawan</label>
                                <select class="form-control" name="karyawan[]" required>
                                    <option selected disabled>Pilih Karyawan</option>
                                    <?php foreach ($users as $item) : ?>
                                        <option value="<?= $item->id_user ?>"><?= $item->nama_lengkap ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php foreach ($criteria as $item) : ?>
                                <div class="form-group">
                                    <label class="col-form-label"><?= $item->nama_kriteria ?></label>
                                    <input type="number" name="<?= strtolower(str_replace(' ', '_', $item->nama_kriteria)) ?>[]" min="1" max="10" class="form-control" required>
                                </div>
                            <?php endforeach; ?>
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </form>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Select Options  -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>


<?= $this->endSection() ?>