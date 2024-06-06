<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid dashboard-content">
    <div class="row">
        <!-- ============================================================== -->
        <!-- Table 1 -->
        <!-- ============================================================== -->
    <div class="col-md-12 col-sm-12 col-12">
        <div class="section-block" id="select">
                <h3 class="section-title">Tabel Hasil Rangking</h3>
                <p>Tabel di bawah menampilkan poin hasil kalkulasi sistem pendukung keputusan degnan metode TOPSIS. </p>
        </div>
        <div class="card">
            <h5 class="card-header">Berdasarkan Akademik</h5>
            <div class="card-body">
                <table id="dtexport1" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama karyawan</th>
                            <th scope="col">Poin Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hasil as $nilai) : ?>
                            <tr>
                                <td><?= $nilai->username ?></td>
                                <td><?= $nilai->nama_lengkap ?></td>
                                <td><?= $nilai->poin_spk ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- End Table 1 -->
        <!-- ============================================================== -->
    </div>
</div>


<?= $this->endSection() ?>