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
                        <h3 class="card-title">Data Aset</h3>
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
                        <!-- Modal Tambah User -->
                        <div class="modal fade" id="tambahDataAset">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data Aset</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Kode Aset</label>
                                                    <input type="text" name="kode_aset" id="kode_aset" class="form-control" readonly>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Kategori Aset</label>
                                                    <select class="form-control" name="mySelect" id="mySelect" onchange="getSelectedOption()">
                                                        <option selected value="0">Pilih Kategori</option>
                                                        <option value="<?= $elektronik; ?>">Elektronik</option>
                                                        <option value="<?= $non_elektronik; ?>">Non Elektronik</option>
                                                    </select>
                                                    <input type="hidden" name="kategori_aset" id="kategori_aset" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Nama Aset</label>
                                                    <select class="form-control select2" name="nama_aset" style="width: 100%;">
                                                        <?php
                                                        while ($data = mysqli_fetch_array($get_nama_aset)) :
                                                            $id_nama_aset = $data['id_nama_aset'];
                                                            $nama_aset = $data['nama'];
                                                        ?>
                                                            <option value="<?= $id_nama_aset; ?>"><?= $nama_aset; ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Lokasi</label>
                                                    <select class="form-control" name="laboratorium" style="width: 100%;">
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
                                                    <label for="">Tahun Pengadaan</label>
                                                    <input type="number" class="form-control" name="tahun_pengadaan" placeholder="Isi tahun pengadaan ...">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Status Aset</label>
                                                    <select name="status_aset" class="form-control">
                                                        <option selected value="baik">Baik</option>
                                                        <option value="perbaikan">Perbaikan</option>
                                                        <option value="rusak">Rusak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Catatan</label>
                                                    <textarea name="catatan" class="form-control" cols="30" rows="5" placeholder="Silahkan isi catatan, jika di perlukan ..."></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="tambahDataAset">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Tambah User -->
                        <table id="formatDataTables" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Kode Aset</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Tahun Pengadaan</th>
                                <th>Status Aset</th>

                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($get_data_aset)) :
                                    $kode_aset = $data['kode_aset'];
                                    $kategori = $data['kategori'];
                                    $nama = $data['nama'];
                                    $lokasi = $data['ruangan'];
                                    $tahun_pengadaan = $data['tahun_pengadaan'];
                                    $status = $data['status_aset'];
                                    $catatan = $data['catatan'];
                                    $id_lab000 = $data['id_laboratorium'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $kode_aset; ?></td>
                                        <td><?= $kategori; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $lokasi; ?></td>
                                        <td class="text-center"><?= $tahun_pengadaan; ?></td>

                                        <td class="text-center"><?php
                                                                if ($status == 'baik') {
                                                                    echo '<span class="badge badge-success">Baik</span>';
                                                                } elseif ($status == 'perbaikan') {
                                                                    echo '<span class="badge badge-warning">Perbaikan</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-danger">Rusak</span>';
                                                                }
                                                                ?></td>

                                        <td class=" text-center">
                                            <button class="btn btn-info" data-toggle="modal" data-target="#detailNamaAset_<?= $kode_aset; ?>"><i class="fas fa-info"></i> Detail</button>
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#editDataAset_<?= $kode_aset; ?>"><i class="fas fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusDataAset_<?= $kode_aset; ?>"><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal Detail Aset -->
                                    <div class="modal fade" id="detailNamaAset_<?= $kode_aset; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Detail Aset Lab Komputer</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" value="<?= $kode_aset; ?>" name="kode_aset">
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label>Kode Aset : </label>
                                                            <span><?= $kode_aset; ?></span>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label>Nama Aset : </label>
                                                            <span><?= $nama; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label>Kategori Aset : </label>
                                                            <span><?= $kategori; ?></span>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label>Tahun Pegadaan Aset : </label>
                                                            <span><?= $tahun_pengadaan; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label>Lokasi Aset : </label>
                                                            <span><?= $lokasi; ?></span>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label>Status Aset : </label>
                                                            <span><?= $status; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Catatan Aset : </label>
                                                        <span><?= $catatan; ?></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Detail Aset -->
                                    <!-- Modal Edit Aset -->
                                    <div class="modal fade" id="editDataAset_<?= $kode_aset; ?>">
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
                                                                <input type="text" name="kode_aset" value="<?= $kode_aset; ?>" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="">Kategori Aset</label>
                                                                <input type="text" name="kategori_aset" value="<?= $kategori; ?>" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="">Nama Aset</label>
                                                                <input type="text" name="kategori_aset" value="<?= $nama; ?>" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="">Lokasi</label>
                                                                <select class="form-control" name="laboratorium" style="width: 100%;">
                                                                    <?php
                                                                    mysqli_data_seek($get_data_laboratorium, 0);
                                                                    while ($data = mysqli_fetch_array($get_data_laboratorium)) :
                                                                        $id_lab = $data['id_lab'];
                                                                        $ruangan = $data['ruangan'];
                                                                        $selected = ($id_lab == $id_lab000) ? 'selected' : ''; // Sesuaikan dengan nilai yang Anda inginkan
                                                                    ?>
                                                                        <option value="<?= $id_lab; ?>" <?= $selected; ?>><?= $ruangan; ?></option>
                                                                    <?php endwhile ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="">Tahun Pengadaan</label>
                                                                <input type="number" class="form-control" name="tahun_pengadaan" value="<?= $tahun_pengadaan; ?>" placeholder="Isi tahun pengadaan ...">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="">Status Aset</label>
                                                                <select name="status_aset" class="form-control">
                                                                    <?php
                                                                    if ($status == 'baik') {
                                                                        echo '
                                                                        <option selected value="baik">Baik</option>
                                                                        <option value="perbaikan">Perbaikan</option>
                                                                        <option value="rusak">Rusak</option>
                                                                        ';
                                                                    } elseif ($status == 'perbaikan') {
                                                                        echo '
                                                                        <option value="baik">Baik</option>
                                                                        <option selected value="perbaikan">Perbaikan</option>
                                                                        <option value="rusak">Rusak</option>
                                                                        ';
                                                                    } else {
                                                                        echo '
                                                                        <option value="baik">Baik</option>
                                                                        <option value="perbaikan">Perbaikan</option>
                                                                        <option selected value="rusak">Rusak</option>
                                                                        ';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label>Catatan</label>
                                                                <textarea name="catatan" class="form-control" cols="30" rows="5" placeholder="<?= $catatan; ?>"></textarea>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-secondary" name="editDataAset">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Edit Aset -->
                                    <!-- Modal Hapus Aset -->
                                    <div class="modal fade" id="hapusDataAset_<?= $kode_aset; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Aset</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" value="<?= $kode_aset; ?>" name="kode_aset">
                                                        <div class="form-group">
                                                            <label>Anda yakin ingin menghapus data : <?= $kode_aset; ?> (<?= $nama; ?>)??</label>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-danger" name="hapusDataAset">Hapus</button>
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
<script type="text/javascript">
    function getSelectedOption() {
        var selectElement = document.getElementById("mySelect");
        var selectedIndex = selectElement.selectedIndex;
        var selectedValue = selectElement.options[selectedIndex].value;
        var selectedText = selectElement.options[selectedIndex].innerHTML;
        document.getElementById("kode_aset").value = selectedValue;
        document.getElementById("kategori_aset").value = selectedText;
    }
</script>
<!-- /.content -->
<?php
include 'layouts/footer.php';
?>