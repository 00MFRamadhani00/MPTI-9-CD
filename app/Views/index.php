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
            <h3 class="text-center mb-3">Selamat Datang, <?= $currentUser->username ?>. </h3>
        </div>
    </div>
    <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-4"> <h5>Total Transaksi</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white h-100">
              <div class="card-body py-4"> <h5>Total Panneku</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-4"> <h5>Total Pembelian</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white h-100">
              <div class="card-body py-4"> <h5>Total Pengeluaran Kas harian</h5>
              </div>
            </div>
          </div>
        <!-- report card -->
    </div>
</div>
<!-- ============================================================== -->
<!-- Dashboard Wrapper  -->
<!-- ============================================================== -->

<?= $this->endSection() ?>