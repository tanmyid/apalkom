<?php
// header
include 'layouts/header.php';

// sidebar
include 'layouts/sidebar.php';
?>
<?php
if (($_SESSION['level']) == 'kalab') {
} else {
    echo '<script>';
    echo ' alert("Anda Bukan Kepala Laboratorium");window.location = "' . $baseURL . '";';
    echo '</script>';
}
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pengajuan Aset Baru</h3>
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
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahPengajuan"><i class="fas fa-plus"></i> Tambah</button>
                        <a href="<?= $baseURL; ?>/backend/laporan/pengajuan" class="btn btn-success float-right" target="_blank"><i class="fas fa-print"></i> Cetak</a>
                        <!-- Modal Pengajuan -->
                        <div class="modal fade" id="tambahPengajuan">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Pengajuan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Kategori</label>
                                                    <select class="form-control" name="kategori">
                                                        <option selected>Pilih</option>
                                                        <option value="Elektronik">Elektronik</option>
                                                        <option value="Non Elektronik">Non Elektronik</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Nama Aset</label>
                                                    <input type="text" class="form-control" name="nama_aset" placeholder="Masukkan Nama Aset ...">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Nama Aset</label>
                                                    <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah ...">
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Lokasi</label>
                                                    <select class="form-control" name="laboratorium">
                                                        <?php
                                                        mysqli_data_seek($get_data_laboratorium, 0);
                                                        while ($data = mysqli_fetch_array($get_data_laboratorium)) :
                                                            $id_laboratorium = $data['id_lab'];
                                                            $ruangan = $data['ruangan'];
                                                        ?>
                                                            <option value="<?= $id_laboratorium; ?>"><?= $ruangan; ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Tanggal Pengajuan</label>
                                                    <div class="input-group date" id="tgl_pemusnahan" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#tgl_pemusnahan" name="tgl_pengajuan" />
                                                        <div class="input-group-append" data-target="#tgl_pemusnahan" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <!-- Jaga jaga kalau di suruh today -->
                                                    <!-- <input type="text" class="form-control" name="tgl_pengajuan" value="<?= date('Y-m-d') ?>" readonly /> -->
                                                </div>
                                                <div class="form-group col">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="tambahPengajuan">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Pengajuan -->
                        <table id="formatDataTables" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Lokasi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($get_data_pengajuan)) :
                                    $id_ajuan = $data['id_ajuan'];
                                    $kategori = $data['kategori'];
                                    $nama = $data['nama'];
                                    $jumlah = $data['jumlah'];
                                    $laboratorium = $data['ruangan'];
                                    $tgl_pengajuan = $data['tgl_pengajuan'];
                                    $id_labo = $data['laboratorium'];
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $kategori; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $jumlah; ?></td>
                                        <td><?= $laboratorium; ?></td>
                                        <td><?= $tgl_pengajuan; ?></td>
                                        <td>
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#editPengajuan<?= $id_ajuan; ?>" onclick="dp_edit3(<?= $id_ajuan; ?>)"><i class="fas fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusPengajuan_<?= $id_ajuan; ?>"><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Pengajuan -->
                                    <div class="modal fade" id="editPengajuan<?= $id_ajuan; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <input type="hidden" class="form-control" name="id_ajuan" value="<?= $id_ajuan; ?>" readonly>
                                                                <label for="">Kategori</label>
                                                                <input type="text" class="form-control" name="kategori" value="<?= $kategori; ?>" readonly>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="">Nama Aset</label>
                                                                <input type="text" class="form-control" name="nama_aset" value="<?= $nama; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="">Jumlah Aset</label>
                                                                <input type="number" class="form-control" name="jumlah" value="<?= $jumlah; ?>">
                                                                </select>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="">Lokasi</label>
                                                                <select class="form-control" name="laboratorium" style="width: 100%;">
                                                                    <?php
                                                                    mysqli_data_seek($get_data_laboratorium, 0);
                                                                    while ($data = mysqli_fetch_array($get_data_laboratorium)) :
                                                                        $id_lab = $data['id_lab'];
                                                                        $ruangan = $data['ruangan'];
                                                                        $selected = ($id_lab == $id_labo) ? 'selected' : ''; // Sesuaikan dengan nilai yang Anda inginkan
                                                                    ?>
                                                                        <option value="<?= $id_lab; ?>" <?= $selected; ?>><?= $ruangan; ?></option>
                                                                    <?php endwhile ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label>Tanggal Pengajuan</label>
                                                                <div class="input-group date" id="tgl<?= $tgl_pengajuan; ?>" data-target-input="nearest">
                                                                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl<?= $id_ajuan; ?>" id="tgl<?= $id_ajuan; ?>" name="tgl_pengajuan" value="<?= $tgl_pengajuan; ?>" />
                                                                    <div class=" input-group-append" data-target="#tgl<?= $id_ajuan; ?>" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                                <!-- Jaga jaga kalau di suruh today -->
                                                                <!-- <input type="text" class="form-control" name="tgl_pengajuan" value="<?= date('Y-m-d') ?>" readonly /> -->
                                                            </div>
                                                            <div class="form-group col">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-secondary" name="editPengajuan">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Pengajuan -->
                                    <!-- Modal Hapus Pengajuan -->
                                    <div class="modal fade" id="hapusPengajuan_<?= $id_ajuan; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Pengajuan Aset</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" value="<?= $id_ajuan; ?>" name="id_ajuan">
                                                        <div class="form-group">
                                                            <label>Anda yakin ingin menghapus data : <?= $id_ajuan; ?> (<?= $nama; ?>)??</label>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-danger" name="hapuPengajuan">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Hapus Pengajuan -->
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
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<?php
include 'layouts/footer.php';
?>