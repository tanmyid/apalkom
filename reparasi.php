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
                        <h3 class="card-title">Data Reparasi</h3>
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
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahDataAset"><i class="fas fa-plus"></i> Tambah</button>
                        <!-- Modal Tambah Reparasi Aset -->
                        <div class="modal fade" id="tambahDataAset">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Kode Aset</label>
                                                    <select class="form-control" name="mySelect" id="mySelect" required onchange="getSelectedOption()">
                                                        <option selected>Pilih..</option>
                                                        <?php while ($data = mysqli_fetch_array($get_data_aset_rusak)) :
                                                            $kode_aset = $data['kode_aset'];
                                                            $id_lab = $data['id_lab'];
                                                            $id_namset = $data['id_namset'];
                                                            $nama = $data['nama'];
                                                            $kategori = $data['kategori'];
                                                        ?>
                                                            <option value="<?= $kode_aset; ?>" data-idnamset="<?= $id_namset; ?>" data-nama="<?= $nama; ?>" data-kategori="<?= $kategori; ?>"><?= $kode_aset; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Nama</label>
                                                    <input type="text" name="selectedNama" id="selectedNama" class="form-control" readonly>
                                                    <input type="hidden" name="selectedIdNamset" id="selectedIdNamset">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Kategori Aset</label>
                                                    <input type="text" name="selectedKategori" id="selectedKategori" class="form-control" readonly>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Status Reparasi</label>
                                                    <select class="form-control" name="status_reparasi" style="width: 100%;">
                                                        <option value="perbaikan">Perbaikan</option>
                                                        <option value="selesai">Selesai</option>
                                                        <option value="rusak">Rusak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Tanggal Masuk</label>
                                                    <div class="input-group date" id="tgl_masuk" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#tgl_masuk" name="tgl_masuk" />
                                                        <div class="input-group-append" data-target="#tgl_masuk" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Tanggal Keluar</label>
                                                    <div class="input-group date" id="tgl_keluar" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#tgl_keluar" name="tgl_keluar" />
                                                        <div class="input-group-append" data-target="#tgl_keluar" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="tambahReparasiAset">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Data Reparasi -->
                        <table id="formatDataTables" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Kode Aset</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Status Reparasi</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($get_data_reparasi)) :
                                    $id_reparasi = $data['id_reparasi'];
                                    $kode_aset = $data['kode_aset'];
                                    $kategori = $data['kategori'];
                                    $nama = $data['nama'];
                                    $status_reparasi = $data['status_reparasi'];
                                    $tgl_masuk = $data['tgl_masuk'];
                                    $tgl_keluar = $data['tgl_keluar'];

                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $kode_aset; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $kategori; ?></td>
                                        <td class="text-center"><?php
                                                                if ($status_reparasi == 'selesai') {
                                                                    echo '<h5><span class="badge badge-success">Selesai</span></h5>';
                                                                } elseif ($status_reparasi == 'perbaikan') {
                                                                    echo '<h5><span class="badge badge-warning">Perbaikan</span></h5>';
                                                                } else {
                                                                    echo '<h5><span class="badge badge-danger">Rusak</span></h5>';
                                                                }
                                                                ?></td>
                                        <td><?= $tgl_masuk; ?></td>
                                        <td><?= $tgl_keluar; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#editReparasi_<?= $id_reparasi; ?>" onclick="dp_edit(<?= $id_reparasi; ?>)"><i class="fas fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusReparasi_<?= $id_reparasi; ?>"><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Aset -->
                                    <div class="modal fade" id="editReparasi_<?= $id_reparasi; ?>">
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
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="">Kode Aset</label>
                                                                <input type="hidden" name="id_reparasi" value="<?= $id_reparasi; ?>" class="form-control" readonly>
                                                                <input type="text" name="kode_aset" value="<?= $kode_aset; ?>" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="">Nama</label>
                                                                <input type="text" name="nama_aset" value="<?= $nama; ?>" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="">Kategori Aset</label>
                                                                <input type="text" name="kategori_aset" value="<?= $kategori; ?>" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="">Status Reparasi</label>
                                                                <select class="form-control" name="status_reparasi" style="width: 100%;">
                                                                    <option value="perbaikan">Perbaikan</option>
                                                                    <option value="selesai">Selesai</option>
                                                                    <option value="rusak">Rusak</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label>Tanggal Masuk</label>
                                                                <div class="input-group date" id="tgl_masuk" data-target-input="nearest">
                                                                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl_masuk" name="tgl_masuk" value="<?= $tgl_masuk; ?>" readonly />
                                                                    <div class="input-group-append" data-target="#tgl_masuk" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label>Tanggal Keluar</label>
                                                                <div class="input-group date" id="tgl<?= $id_reparasi; ?>" data-target-input="nearest">
                                                                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl<?= $id_reparasi; ?>" id="tgl<?= $id_reparasi; ?>" name="tgl_keluar" value="<?= $tgl_keluar; ?>" />
                                                                    <div class=" input-group-append" data-target="#tgl<?= $id_reparasi; ?>" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-secondary" name="editReparasi">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Edit Aset -->
                                    <!-- Modal Hapus Aset -->
                                    <div class="modal fade" id="hapusReparasi_<?= $id_reparasi; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" value="<?= $id_reparasi; ?>" name="id_reparasi">
                                                        <div class="form-group">
                                                            <label>Anda yakin ingin menghapus data : <?= $kode_aset; ?> (<?= $nama; ?>)??</label>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-danger" name="hapusReparasi">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Hapus Aset -->
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
<script>
    function getSelectedOption() {
        var select = document.getElementById("mySelect");
        var selectedNamaInput = document.getElementById("selectedNama");
        var selectedKategoriInput = document.getElementById("selectedKategori");
        var selectedIdNamsetInput = document.getElementById("selectedIdNamset");

        var selectedOption = select.options[select.selectedIndex];
        var nama = selectedOption.getAttribute("data-nama");
        var kategori = selectedOption.getAttribute("data-kategori");
        var idNamset = selectedOption.getAttribute("data-idnamset");

        // Set nilai input sesuai dengan variabel
        selectedNamaInput.value = nama;
        selectedKategoriInput.value = kategori;
        selectedIdNamsetInput.value = idNamset; // Simpan value id_namset untuk pengiriman ke server
    }
</script>
<!-- /.content -->
<?php
include 'layouts/footer.php';
?>