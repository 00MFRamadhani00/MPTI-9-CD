<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<!-- ============================================================== -->
<!-- Wrapper  -->
<!-- ============================================================== -->
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-10">
            <!-- ============================================================== -->
            <!-- Pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header" id="top">
                        <h2 class="pageheader-title">Formulir Isi Profil</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Pageheader  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Form Create Profile  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Input Data Anda</h3>
                        <p>Silahkan input data profil anda, pastikan semua kolom sesuai dengan identitas karyawan.</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulir Data Profil</h5>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('/save-profile') ?>">
                                <div class="form-group">
                                    <label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan">Riwayat Pendidikan</label>
                                    <select class="form-control" name="pendidikan" required>
                                        <option value="" selected disabled>Pilih Kelas</option>
                                            <option value="S3 Sederajat">S3 Sederajat</option>
                                            <option value="S2 Sederajat">S2 Sederajat</option>
                                            <option value="S1 Sederajat">S1 Sederajat</option>
                                            <option value="SMA Sederajat">SMA Sederajat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="col-form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Anda" required>
                                </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" id="submitBtn" type="submit">Submit</button>
                    </form>
                    <!-- ============================================================== -->
                    <!-- Form Create Profile  -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>