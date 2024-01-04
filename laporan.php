<?php
// header
include 'layouts/header.php';
// sidebar
include 'layouts/sidebar.php';
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-file"></i>
                    Keseluruhan Laporan
                </h3>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Data Aset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Reparasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Pemusnahan</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Settings</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade active show mt-2" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                        <a href="<?= $baseURL; ?>/backend/laporan/data_aset" class="btn btn-success mb-2" target="_blank"><i class="fas fa-print"></i> Cetak</a>
                        <table id="" class="table table-bordered table-hover display" style="width:100%">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Kode Aset</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Lokasi</th>
                                <th>Tahun Pengadaan</th>
                                <th>Status Aset</th>
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
                                    $gambar = $data['img'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $kode_aset; ?></td>
                                        <td><?= $kategori; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td class="text-center"><img src="<?= $gambar; ?>" alt="" width="100rem"></td>
                                        <td><?= $lokasi; ?></td>
                                        <td class="text-center"><?= $tahun_pengadaan; ?></td>

                                        <td class="text-center"><?php
                                                                if ($status == 'baik') {
                                                                    echo '<h5><span class="badge badge-success">Baik</span></h5>';
                                                                } elseif ($status == 'perbaikan') {
                                                                    echo '<h5><span class="badge badge-warning">Perbaikan</span></h5>';
                                                                } elseif ($status == 'bekas_pakai') {
                                                                    echo '<h5><span class="badge badge-secondary">Bekas Pakai</span></h5>';
                                                                } else {
                                                                    echo '<h5><span class="badge badge-danger">Rusak</span></h5>';
                                                                }
                                                                ?></td>
                                    </tr>
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
                    <div class="tab-pane fade mt-2" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                        <a href="<?= $baseURL; ?>/backend/laporan/reparasi" class="btn btn-success mb-2" target="_blank"><i class="fas fa-print"></i> Cetak</a>
                        <table id="" class="table table-bordered table-hover display" style="width:100%">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Kode Aset</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Status Reparasi</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
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
                                        <td class="text-center"><?= $tgl_masuk; ?></td>
                                        <td class="text-center"><?= $tgl_keluar; ?></td>
                                    </tr>
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
                    <div class="tab-pane fade mt-2" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                        <a href="<?= $baseURL; ?>/backend/laporan/pemusnahan" class="btn btn-success mb-2" target="_blank"><i class="fas fa-print"></i> Cetak</a>
                        <table id="" class="table table-bordered table-hover display" style="width:100%">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Kode Aset</th>
                                <th>Tanggal Pemusnahan</th>
                                <th>Metode Pemusnahan</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($get_data_pemusnahan)) :
                                    $id_pemusnahan = $data['id_pemusnahan'];
                                    $kategori = $data['kategori'];
                                    $nama = $data['nama'];
                                    $kode_aset = $data['kode_aset'];
                                    $tgl_pemusnahan = $data['tgl_pemusnahan'];
                                    $metode = $data['metode'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $kategori; ?></td>
                                        <td><?= $kode_aset; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $tgl_pemusnahan; ?></td>
                                        <td class="text-center"><?php
                                                                if ($metode == 'hibah') {
                                                                    echo '<h5><span class="badge badge-success">Di Hibahkan</span></h5>';
                                                                } elseif ($metode == 'arsip') {
                                                                    echo '<h5><span class="badge badge-warning">Di Arsipkan</span></h5>';
                                                                } else {
                                                                    echo '<h5><span class="badge badge-danger">Di Buang</span></h5>';
                                                                }
                                                                ?></td>
                                    </tr>
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
                    <!-- <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab"></div> -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    </div>
</section>
<!-- /.content -->

<?php
include 'layouts/footer.php';
?>