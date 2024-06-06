<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid  dashboard-content">
    <div class="row">
        <!-- ============================================================== -->
        <!-- User List Table -->
        <!-- ============================================================== -->
        <div class="col-md-12 col-sm-12 col-12">
            <div class="section-block" id="select">
                <h3 class="section-title">Tabel Daftar Karyawan</h3>
                <p>Tabel di bawah menampilkan daftar karyawan yang terdaftar di kantor kelurahan desa Gadingrejo. </p>
            </div>
            <div class="card">
                <h5 class="card-header">Daftar Karyawan</h5>
                <div class="card-body">
                    <table id="dtexport_userlist" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $user) :
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td><?= $user->name; ?></td>
                                    <td>
                                        <a href="<?= base_url('user-detail/' . $user->userid) ?>" class="btn btn-warning">Detail</a>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('user-delete/' . $user->userid) ?>" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure Want to Delete User <?= $user->username ?> ?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End User List Table -->
        <!-- ============================================================== -->
    </div>
</div>

<?= $this->endSection() ?>