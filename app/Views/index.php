<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<!-- Logged In User Information -->
<?php
$auth = service('authentication');
$userId = $auth->id();
$currentUser = $auth->user();
?>
<!-- Logged In User Information -->

<!-- ============================================================== -->
<!-- Dashboard Wrapper  -->
<!-- ============================================================== -->
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="text-center mb-3">Selamat Datang, <?= $currentUser->email ?> </h3>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Dashboard Wrapper  -->
<!-- ============================================================== -->

<?= $this->endSection() ?>