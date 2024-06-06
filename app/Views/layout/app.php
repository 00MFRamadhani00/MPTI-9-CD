<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/images/weblogo.png') ?>" type="image/x-icon">
    <title><?= $title ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/fonts/circular-std/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/charts/chartist-bundle/chartist.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/charts/morris-bundle/morris.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/fonts/material-design-iconic-font/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/charts/c3charts/c3.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/fonts/flag-icon-css/flag-icon.min.css') ?>">

    <!-- DataTable CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script defer src="<?= base_url('assets/js/dataTableScript.js') ?>"></script>
    <script defer src="<?= base_url('assets/js/formValidation.js') ?>"></script>

</head>

<body>

    <!-- PHP Query Related to User Logged In Information -->
    <?php
    $auth = service('authentication');
    $userId = $auth->id();
    $currentUser = $auth->user();

    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('profil_karyawan');

    $this->builder->select()->where('id_user', $userId);
    $queryid = $this->builder->get();

    if ($queryid->getNumRows() > 0) {
        $check = 1;
    } else {
        $check = 0;
    }
    ?>
    <!-- PHP Query Related to User Logged In Information -->

    <!-- ============================================================== -->
    <!-- Main Wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- Navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <img class="nav-img" src="<?= base_url('/assets/images/weblogo.png') ?>" alt="">
                <a class="navbar-brand" href="<?= base_url('/') ?>">SPK TOPSIS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/images/profile-icon.jpg') ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $currentUser->username ?></h5>
                                </div>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- End navbar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <?php if (in_groups('admin')) { ?>
                                <li class="nav-divider">
                                    Menu
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Karyawan<span class="badge badge-success">6</span></a>
                                    <div id="submenu-1" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('/user-list') ?>">Data Karyawan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Kriteria</a>
                                    <div id="submenu-4" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('/kriteria-list') ?>">Data Kriteria</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-table"></i>Perhitungan</a>
                                    <div id="submenu-3" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('/') ?>">Perhitungan TOPSIS</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-chart-pie"></i>Ranking</a>
                                    <div id="submenu-9" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('/ranking-list') ?>">Data Hasil Perangkingan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } elseif (in_groups('karyawan')) { ?>
                                <li class="nav-divider">
                                    Menu
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Profil<span class="badge badge-success"></span></a>
                                    <div id="submenu-1" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <?php if ($check == 0) { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('/create-profile') ?>">Buat Profil</a>
                                                </li>
                                            <?php } else { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('/profile') ?>">Profil Anda</a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php if ($check == 1) { ?>
                                    <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Kriteria</a>
                                    <div id="submenu-4" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('/kriteria-list') ?>">Data Kriteria</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-chart-pie"></i>Ranking</a>
                                    <div id="submenu-9" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('/ranking-list') ?>">Data Hasil Perangkingan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Dashboard Wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">

            <?= $this->renderSection('content') ?>

            <!-- ============================================================== -->
            <!-- Footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <span>Copyright &copy; KP-UNILA <?= date('Y'); ?>.</span>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="#">About</a>
                                <a href="#">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Dashboard Wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Main Wrapper  -->
    <!-- ============================================================== -->

    <!-- Optional JavaScript -->

    <!-- jquery 3.3.1 -->
    <script src=" <?= base_url('assets/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
    <!-- bootstap bundle js -->
    <script src="<?= base_url('assets/vendors/bootstrap/js/bootstrap.bundle.js') ?>"></script>
    <!-- slimscroll js -->
    <script src="<?= base_url('assets/vendors/slimscroll/jquery.slimscroll.js') ?>"></script>
    <!-- main js -->
    <script src="<?= base_url('assets/libs/js/main-js.js') ?>"></script>
    <!-- chart chartist js -->
    <script src="<?= base_url('assets/vendors/charts/chartist-bundle/chartist.min.js') ?>"></script>
    <!-- sparkline js -->
    <script src="<?= base_url('assets/vendors/charts/sparkline/jquery.sparkline.js') ?>"></script>
    <!-- morris js -->
    <script src="<?= base_url('assets/vendors/charts/morris-bundle/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/charts/morris-bundle/morris.js') ?>"></script>
    <!-- chart c3 js -->
    <script src="<?= base_url('assets/vendors/charts/c3charts/c3.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/charts/c3charts/d3-5.4.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/charts/c3charts/C3chartjs.js') ?>"></script>
    <script src="<?= base_url('assets/libs/js/dashboard-ecommerce.js') ?>"></script>

    <!-- charts js -->
    <script src="<?= base_url('assets/vendors/charts/charts-bundle/Chart.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/charts/charts-bundle/chartjs.js') ?>"></script>
    <script src="<?= base_url('assets/libs/js/main-js.js') ?>"></script>

</body>

</html>