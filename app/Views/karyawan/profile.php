<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header" id="top">
                <h2 class="pageheader-title">Detail Profil</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
    <!-- Profile Detail -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card card-fluid">
                <div class="card-body text-center">
                    <a href="user-profile.html" class="user-avatar user-avatar-xl my-3">
                        <img src="<?= base_url('assets/images/profile-icon.jpg') ?>" alt="User Avatar" class="rounded-circle user-avatar-xl">
                    </a>
                    <?php foreach ($profil as $data) : ?>
                        <h3 class="card-title mb-2 text-truncate">
                            <a href="#"><?= $data->nama_lengkap ?></a>
                        </h3>
                        <h6 class="card-subtitle text-muted mb-3"> <?= $data->email ?> </h6>
                </div>
                <footer class="card-footer p-0">
                    <div class="card-footer-item card-footer-item-bordered">
                        <div class="metric">
                            <p class="metric-label"> Nama Lengkap </p>
                            <h6 class="metric-value"> <?= $data->nama_lengkap ?> </h6>
                        </div>
                    </div>
                    <div class="card-footer-item card-footer-item-bordered">
                        <div class="metric">
                            <p class="metric-label"> Riwayat Pendidikan </p>
                            <h6 class="metric-value"> <?= $data->pendidikan ?> </h6>
                        </div>
                    </div>
                    <div class="card-footer-item card-footer-item-bordered">
                        <div class="metric">
                            <p class="metric-label"> Alamat </p>
                            <h6 class="metric-value"> <?= $data->alamat ?> </h6>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end Profile Detail -->
    <!-- ============================================================== -->
        <?php endforeach; ?>
</div>

<?= $this->endSection() ?>