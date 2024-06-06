<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/images/weblogo.png') ?>" type="image/x-icon">
    <title>Registrasi Akun</title>
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
    <!-- Signup Form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="<?= url_to('register') ?>" method="post">
        <?= csrf_field() ?>
        <div class="card">
            <div class="card-header text-center">
                <a href="../index.html"><img class="nav-img" src="<?= base_url('../assets/images/weblogo.png') ?>" alt="logo"></a>
                <h3 class="mt-3">Formulir Registrasi</h3><span class="splash-description">Silahkan Masukkan Informasi Kredensial Anda.</span>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="role">Select Your Role</label>
                    <select class="form-control" name="role" required>
                        <option selected disabled>Select Your Role</option>
                        <option value="admin">Admin</option>
                        <option value="karyawan">Karyawan</option>
                    </select>
                </div>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Daftarkan Akun</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Sudah Punya Akun? <a href="<?= url_to('login') ?>" class="text-secondary">Masuk Di Sini.</a></p>
            </div>
        </div>
    </form>
    <!-- ============================================================== -->
    <!-- End Signup Form  -->
    <!-- ============================================================== -->
</body>


</html>