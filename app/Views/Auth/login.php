<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/images/weblogo.png') ?>" type="image/x-icon">
    <title>Masuk Akun</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('../assets/vendors/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('../assets/vendors/fonts/circular-std/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('../assets/libs/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('../assets/vendors/fonts/fontawesome/css/fontawesome-all.css') ?>">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Login Page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <a href="../index.html"><img class="nav-img" src="<?= base_url('../assets/images/weblogo.png') ?>" alt="logo"></a>
                <h3 class="mt-3">Masuk Akun</h3><span class="splash-description">Silahkan Masukkan Kredensial Akun Anda.</span>
            </div>
            <div class="card-body">
                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="login" type="text" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password" autocomplete="off">
                    </div>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="<?= url_to('register') ?>" class="footer-link">Registrasi Akun</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Login Page  -->
    <!-- ============================================================== -->

    <!-- Optional JavaScript -->
    <script src="<?= base_url('../assets/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('../assets/vendors/bootstrap/js/bootstrap.bundle.js') ?>"></script>
</body>

</html>