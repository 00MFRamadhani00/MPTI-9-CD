<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-10">
            <!-- ============================================================== -->
            <!-- Pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header" id="top">
                        <h2 class="pageheader-title">Admin Dashboard </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Pageheader  -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>