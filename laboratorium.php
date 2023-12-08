<?php
// header
include 'layouts/header.php';
// sidebar
include 'layouts/sidebar.php';
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Laboratorium</h3>
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
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahLab"><i class="fas fa-plus"></i> Tambah</button>
                        <!-- Modal Tambah Lab -->
                        <div class="modal fade" id="tambahLab">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data Ruangan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label>Nomor Ruangan</label>
                                                <input type="number" class="form-control" placeholder="Masukkan no ruangan ..." name="ruangan">
                                            </div>
                                            <div class="form-group">
                                                <label>Laboran</label>
                                                <select class="form-control" name="laboran">
                                                    <option selected>Pilih laboran</option>
                                                    <?php
                                                    while ($laboran = mysqli_fetch_array($get_data_laboran)) {

                                                    ?>
                                                        <option value="<?= $laboran['id_pengguna']; ?>"><?= $laboran['nama']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="tambahLab">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Tambah Lab -->
                        <table id="formatDataTables" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Laboran</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($get_data_laboratorium)) :
                                    $id_laboratorium = $data['id_lab'];
                                    $ruangan = $data['ruangan'];
                                    $laboran = $data['laboran'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $ruangan; ?></td>
                                        <td class="text-center"><?= $laboran; ?></td>
                                        <td class=" text-center">
                                            <button class="btn btn-info" data-toggle="modal" data-target="#editLab<?= $id_laboratorium; ?>"><i class="fas fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusLab<?= $id_laboratorium; ?>"><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Lab -->
                                    <div class="modal fade" id="editLab<?= $id_laboratorium; ?>">
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
                                                        <input type="hidden" class="form-control" value="<?= $id_laboratorium; ?>" name="id_laboratorium">
                                                        <div class="form-group">
                                                            <label>Ruangan</label>
                                                            <input type="number" class="form-control" value="<?= filter_var($ruangan, FILTER_SANITIZE_NUMBER_INT); ?>" placeholder="<?= $ruangan; ?>" name="ruangan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Laboran</label>
                                                            <select class="form-control" name="laboran">
                                                                <option selected>Ganti laboran</option>
                                                                <?php
                                                                mysqli_data_seek($get_data_laboran, 0);
                                                                while ($laboran = mysqli_fetch_array($get_data_laboran)) :
                                                                ?>
                                                                    <option value="<?= $laboran['id_pengguna']; ?>"><?= $laboran['nama']; ?></option>
                                                                <?php endwhile ?>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-info" name="editLab">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Edit Lab -->
                                    <!-- Modal Hapus Lab -->
                                    <div class="modal fade" id="hapusLab<?= $id_laboratorium; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Lab</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" value="<?= $id_laboratorium; ?>" name="id_laboratorium">
                                                        <div class="form-group">
                                                            <label>Anda yakin ingin menghapus <?= $ruangan; ?>??</label>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-danger" name="hapusLab">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Hapus Lab -->
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