<?php
// header
include 'layouts/header.php';
// sidebar
include 'layouts/sidebar.php';

if ($_SESSION['level'] !== 'kalab') {
    echo '<script>alert("Access Denied :D");window.location.href="' . $baseURL . '"</script>';
}

?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kelola User</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahUser"><i class="fas fa-plus"></i> Tambah</button>
                        <!-- Modal Tambah User -->
                        <div class="modal fade" id="tambahUser">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="username">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label>Level</label>
                                                <select class="form-control" name="level_user">
                                                    <option selected>Pilih..</option>
                                                    <option value="laboran">Laboran</option>
                                                    <option value="kalab">Kepala Laboratorium</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="tambahUser">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Tambah User -->
                        <table id="formatDataTables" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Profil</th>
                                <th>Username</th>
                                <!-- <th>Password</th> -->
                                <th>Level</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($get_data_user)) :
                                    $id_pengguna = $data['id_pengguna'];
                                    $username = $data['username'];
                                    $password = $data['password'];
                                    $nama = $data['nama'];
                                    $level = $data['level'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td class="text-center"><?php
                                                                if ($level == 'kalab') {
                                                                    echo '<img src="' . $baseURL . '/assets/images/kalab.png" class="img-circle" height="60" width="60" alt="Ka. Lab">';
                                                                } else {
                                                                    echo '<img src="' . $baseURL . '/assets/images/laboran.png" class="img-circle" height="60" width="60" alt="Laboran">';
                                                                }
                                                                ?></td>
                                        <td><?= $username; ?></td>
                                        <td><?php if ($level == 'kalab') {
                                                echo 'Kepala Laboratorium';
                                            } else echo 'Laboran'; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-toggle="modal" data-target="#editUser<?= $id_pengguna; ?>">Edit</button>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#hapusUser<?= $id_pengguna; ?>">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit User -->
                                    <div class="modal fade" id="editUser<?= $id_pengguna; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" value="<?= $id_pengguna; ?>" name="id_pengguna">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" value="<?= $nama; ?>" name="nama">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" value="<?= $username; ?>" name="username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengganti...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Level</label>
                                                            <select class="form-control" name="level_user">
                                                                <option <?php if ($level == 'kalab') {
                                                                            echo 'selected';
                                                                        } ?> value="kalab">Kepala Laboratorium</option>
                                                                <option <?php if ($level == 'laboran') {
                                                                            echo 'selected';
                                                                        } ?> value="laboran">Laboran</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary" name="editUser">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Edit User -->
                                    <!-- Modal Hapus User -->
                                    <div class="modal fade" id="hapusUser<?= $id_pengguna; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus User</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" value="<?= $id_pengguna; ?>" name="id_pengguna">
                                                        <div class="form-group">
                                                            <label>Anda yakin ingin menghapus user <?= $nama; ?>??</label>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-danger" name="hapusUser">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Hapus User -->
                                <?php
                                endwhile;
                                ?>
                            </tbody>
                            <!-- <tfoot>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Opsi</th>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?php
include 'layouts/footer.php';
?>