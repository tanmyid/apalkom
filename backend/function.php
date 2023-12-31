<?php
require 'var.php';

// user function 
/// get data from database
$get_data_user = mysqli_query($koneksi, "SELECT * FROM pengguna");
/// menghitung total user
$count_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(username) as tot_user FROM pengguna"))['tot_user'];
/// tambah user
if (isset($_POST['tambahUser'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level_user'];

    $prc = mysqli_query($koneksi, "INSERT INTO pengguna (id_pengguna, username, password, nama, level) VALUES ('', '$username', '" . md5($password) . "', '$nama', '$level')");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di input");window.location = "' . $baseURL . '/kelola_user";';
    } else {
        echo 'alert("Data Gagal di input");window.location = "' . $baseURL . '/kelola_user";';
    }
    echo '</script>';
}
/// edit user
if (isset($_POST['editUser'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level_user'];
    $id_pengguna = $_POST['id_pengguna'];

    if ($_POST['password'] == '') {
        $prc = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', nama='$nama', level='$level' WHERE id_pengguna='$id_pengguna'");
    } else {
        $prc = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='" . md5($password) . "', nama='$nama', level='$level' WHERE id_pengguna='$id_pengguna'");
    }
    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di Ubah");window.location = "' . $baseURL . '/kelola_user";';
    } else {
        echo 'alert("Data Gagal di Ubah");window.location = "' . $baseURL . '/kelola_user";';
    }
    echo '</script>';
}
/// hapus user
if (isset($_POST['hapusUser'])) {
    $id_pengguna = $_POST['id_pengguna'];

    $prc = mysqli_query($koneksi, "DELETE FROM pengguna WHERE id_pengguna ='$id_pengguna'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di Hapus");window.location = "' . $baseURL . '/kelola_user";';
    } else {
        echo 'alert("Data Gagal di Hapus");window.location = "' . $baseURL . '/kelola_user";';
    }
    echo '</script>';
}
/// login user
if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $prc = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
    $get_row = mysqli_num_rows($prc);

    if ($get_row > 0) {
        $data = mysqli_fetch_assoc($prc);
        if ($data['level'] == "laboran") {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = 'laboran';
            header('location:index');
        } else if ($data['level'] == "kalab") {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = 'kalab';
            header('location:index');
        } else {
            echo '
            <script>alert("Username atau Password salah");
            window.location.href="' . $baseURL . '/login"
            </script>';
        }
    } else {
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="' . $baseURL . '/login"
        </script>';
    }
}
/// logout user
if (isset($_POST['btnLogout'])) {
    session_start();
    session_unset();
    session_destroy();
    header('Location: ' . $baseURL . '/login');
}
// end user function 


// nama aset function
/// menghitung jumlah nama set
$count_nama_aset = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(nama) as tot_namset FROM nama_aset"))['tot_namset'];
/// get data nama aset from database
$get_nama_aset = mysqli_query($koneksi, "SELECT * FROM nama_aset");
/// tambah nama aset
if (isset($_POST['tambahNamaAset'])) {
    $nama_aset = $_POST['nama_aset'];

    $prc = mysqli_query($koneksi, "INSERT INTO nama_aset (id_nama_aset, nama) VALUES ('', '$nama_aset')");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di input");window.location = "' . $baseURL . '/nama_aset";';
    } else {
        echo 'alert("Data Gagal di input");window.location = "' . $baseURL . '/nama_aset";';
    }
    echo '</script>';
}
/// edit nama aset
if (isset($_POST['editNamaAset'])) {
    $id_nama_aset = $_POST['id_nama_aset'];
    $nama_aset = $_POST['nama_aset'];

    $prc = mysqli_query($koneksi, "UPDATE nama_aset SET nama='$nama_aset' WHERE id_nama_aset='$id_nama_aset'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di input");window.location = "' . $baseURL . '/nama_aset";';
    } else {
        echo 'alert("Data Gagal di input");window.location = "' . $baseURL . '/nama_aset";';
    }
    echo '</script>';
}
/// hapus nama aset
if (isset($_POST['hapusNamaAset'])) {
    $id_nama_aset = $_POST['id_nama_aset'];

    $prc = mysqli_query($koneksi, "DELETE FROM nama_aset WHERE id_nama_aset ='$id_nama_aset'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di hapus");window.location = "' . $baseURL . '/nama_aset";';
    } else {
        echo 'alert("Data Gagal di hapus");window.location = "' . $baseURL . '/nama_aset";';
    }
    echo '</script>';
}
// end nama aset function

// laboratorium function
/// get data laboran from user
$get_data_laboran = mysqli_query($koneksi, "SELECT id_pengguna,nama FROM pengguna WHERE level='laboran'");
/// get data laboratorium
$get_data_laboratorium = mysqli_query($koneksi, "SELECT laboratorium.id_laboratorium AS id_lab, laboratorium.ruangan AS ruangan, pengguna.nama AS laboran FROM laboratorium INNER JOIN pengguna ON laboratorium.laboran = pengguna.id_pengguna");
/// tambah data laboratorium
if (isset($_POST['tambahLab'])) {
    $ruangan = 'Lab ' . $_POST['ruangan'];
    $laboran = $_POST['laboran'];

    $prc = mysqli_query($koneksi, "INSERT INTO laboratorium (id_laboratorium, ruangan, laboran) VALUES ('', '$ruangan', '$laboran')");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di input");window.location = "' . $baseURL . '/laboratorium";';
    } else {
        echo 'alert("Data Gagal di input");window.location = "' . $baseURL . '/laboratorium";';
    }
    echo '</script>';
}
/// edit data laboratorium
if (isset($_POST['editLab'])) {
    $id_laboratorium = $_POST['id_laboratorium'];
    $ruangan = 'Lab ' . $_POST['ruangan'];
    $laboran = $_POST['laboran'];

    $prc = mysqli_query($koneksi, "UPDATE laboratorium SET ruangan='$ruangan',laboran='$laboran' WHERE id_laboratorium='$id_laboratorium'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di edit");window.location = "' . $baseURL . '/laboratorium";';
    } else {
        echo 'alert("Data Gagal di edit");window.location = "' . $baseURL . '/laboratorium";';
    }
    echo '</script>';
}
/// hapus data laboratorium
if (isset($_POST['hapusLab'])) {
    $id_laboratorium = $_POST['id_laboratorium'];

    $prc = mysqli_query($koneksi, "DELETE FROM laboratorium WHERE id_laboratorium ='$id_laboratorium'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di hapus");window.location = "' . $baseURL . '/laboratorium";';
    } else {
        echo 'alert("Data Gagal di hapus");window.location = "' . $baseURL . '/laboratorium";';
    }
    echo '</script>';
}

// end laboratorium function

// aset function
/// generate kode aset
$count_data_aset = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kode_aset) as count_DA FROM aset;"))['count_DA'];
if ($count_data_aset <= 0) {
    $nomor = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kode_aset) as KD FROM aset;"))['KD'];
    $elektronik = "SMA1NP-AST-" . sprintf("%04d", $nomor + 1, 3, 3) . "-E";
    $non_elektronik = "SMA1NP-AST-" . sprintf("%04d", $nomor + 1, 3, 3) . "-N";
} else {
    $nomor = mysqli_fetch_array(mysqli_query($koneksi, "SELECT LPAD(CAST(SUBSTRING(kode_aset, LOCATE('-', kode_aset, LOCATE('-', kode_aset) + 1) + 1, 4) AS UNSIGNED) + 1, 4, '0') AS nomor FROM aset WHERE kode_aset LIKE 'SMA1NP-AST-%' ORDER BY `nomor` DESC LIMIT 1"))['nomor'];
    $elektronik = "SMA1NP-AST-" . $nomor . "-E";
    $non_elektronik = "SMA1NP-AST-" . $nomor . "-N";
}
/// get data aset
$get_data_aset = mysqli_query(
    $koneksi,
    "SELECT aset.kode_aset, aset.kategori, nama_aset.nama, laboratorium.ruangan, aset.tahun_pengadaan, aset.status_aset, aset.catatan, laboratorium.id_laboratorium, aset.img FROM aset 
 INNER JOIN nama_aset ON aset.nama = nama_aset.id_nama_aset 
 INNER JOIN laboratorium ON aset.laboratorium = laboratorium.id_laboratorium ORDER BY `aset`.`kode_aset` ASC"
);
/// tambah data aset
if (isset($_POST['tambahDataAset'])) {
    $kode_aset = $_POST['kode_aset'];
    $kategori = $_POST['kategori_aset'];
    $nama = $_POST['nama_aset'];
    $lokasi = $_POST['laboratorium'];
    $tahun_pengadaan = $_POST['tahun_pengadaan'];
    $status_aset = $_POST['status_aset'];
    $catatan = $_POST['catatan'];
    $imgBase64 = 'data:' . mime_content_type($_FILES['gambar']['tmp_name']) . ';base64,' . base64_encode(file_get_contents($_FILES['gambar']['tmp_name']));

    $prc = mysqli_query($koneksi,   "INSERT INTO aset (kode_aset, kategori, nama, laboratorium, tahun_pengadaan, status_aset, catatan, img) 
                                    VALUES ('$kode_aset', '$kategori', '$nama', '$lokasi', '$tahun_pengadaan', '$status_aset', '$catatan', '$imgBase64')");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di input");window.location = "' . $baseURL . '/data_aset";';
    } else {
        echo 'alert("Data Gagal di input");window.location = "' . $baseURL . '/data_aset";';
    }
    echo '</script>';
}

/// edit data aset
if (isset($_POST['editDataAset'])) {
    $kode_aset = $_POST['kode_aset'];
    $lokasi = $_POST['laboratorium'];
    $tahun_pengadaan = $_POST['tahun_pengadaan'];
    $status_aset = $_POST['status_aset'];
    $catatan = $_POST['catatan'];

    if ($_POST['catatan'] == '') {
        $prc = mysqli_query($koneksi, "UPDATE aset SET laboratorium='$lokasi', tahun_pengadaan='$tahun_pengadaan', status_aset='$status_aset' WHERE kode_aset='$kode_aset'");
    } else {
        $prc = mysqli_query($koneksi, "UPDATE aset SET laboratorium='$lokasi', tahun_pengadaan='$tahun_pengadaan', status_aset='$status_aset', catatan='$catatan'  WHERE kode_aset='$kode_aset'");
    }

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di edit");window.location = "' . $baseURL . '/data_aset";';
    } else {
        echo 'alert("Data Gagal di edit");window.location = "' . $baseURL . '/data_aset";';
    }
    echo '</script>';
}

/// hapus data aset
if (isset($_POST['hapusDataAset'])) {
    $kode_aset = $_POST['kode_aset'];

    $prc = mysqli_query($koneksi, "DELETE FROM aset WHERE kode_aset ='$kode_aset'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di hapus");window.location = "' . $baseURL . '/data_aset";';
    } else {
        echo 'alert("Data Gagal di hapus");window.location = "' . $baseURL . '/data_aset";';
    }
    echo '</script>';
}
/// end data aset function

/// kondisi aset function
$get_data_aset_perbaikan = mysqli_query($koneksi, "SELECT aset.kode_aset, aset.kategori, nama_aset.nama, laboratorium.ruangan, aset.status_aset, laboratorium.id_laboratorium AS id_lab, nama_aset.id_nama_aset AS id_namset, aset.img
FROM aset 
INNER JOIN nama_aset ON aset.nama = nama_aset.id_nama_aset 
INNER JOIN laboratorium ON aset.laboratorium = laboratorium.id_laboratorium WHERE aset.status_aset='perbaikan' AND aset.kode_aset 
NOT IN (SELECT kode_aset FROM teknisi) ORDER BY aset.kode_aset ASC");
/// tambah aset reparasi
if (isset($_POST['tambahReparasiAset'])) {
    $kode_aset = $_POST['mySelect'];
    $nama = $_POST['selectedIdNamset'];
    $kategori = $_POST['selectedKategori'];
    $status_reparasi = $_POST['status_reparasi'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $tgl_keluar = $_POST['tgl_keluar'];

    $cek_duplicate = mysqli_fetch_array(mysqli_query($koneksi, "SELECT kode_aset FROM teknisi WHERE kode_aset='$kode_aset'"));

    // $prc = mysqli_query($koneksi,   "INSERT INTO teknisi (id_reparasi, kode_aset, nama , kategori, status_reparasi, tgl_masuk, tgl_keluar) VALUES ('', '$kode_aset', '$nama', '$kategori', '$status_reparasi', '$tgl_masuk', '$tgl_keluar')");

    if (!is_null($cek_duplicate)) {
        echo '<script>alert("Data Sudah Ada!!!");window.location = "' . $baseURL . '/reparasi";</script>';
    } else {
        $prc = mysqli_query($koneksi,   "INSERT INTO teknisi (id_reparasi, kode_aset, nama , kategori, status_reparasi, tgl_masuk, tgl_keluar) VALUES ('', '$kode_aset', '$nama', '$kategori', '$status_reparasi', '$tgl_masuk', '$tgl_keluar')");
        if ($prc == TRUE) {
            echo '<script> alert("Data Berhasil di input");window.location = "' . $baseURL . '/reparasi";</script>';
        } else {
            echo '<script>alert("Data Gagal di input");window.location = "' . $baseURL . '/reparasi";</script>';
        }
    }
}

/// get data reparasi
$count_reparasi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_reparasi) as count_REP FROM teknisi;"))['count_REP'];
$get_data_reparasi = mysqli_query($koneksi, "SELECT teknisi.id_reparasi, teknisi.kode_aset, nama_aset.nama, teknisi.kategori, teknisi.status_reparasi, teknisi.tgl_masuk, teknisi.tgl_keluar
FROM teknisi
INNER JOIN nama_aset ON teknisi.nama = nama_aset.id_nama_aset");

/// edit reparasi 
if (isset($_POST['editReparasi'])) {
    $id_reparasi = $_POST['id_reparasi'];
    $kode_aset = $_POST['kode_aset'];
    $tgl_masuk = $_POST['tgl_masuk'];

    $tgl_keluar = $_POST['tgl_keluar'];
    $status_reparasi = $_POST['status_reparasi'];

    $prc = mysqli_query($koneksi, "UPDATE teknisi SET status_reparasi='$status_reparasi', tgl_keluar='$tgl_keluar' WHERE id_reparasi='$id_reparasi'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di edit");window.location = "' . $baseURL . '/reparasi";';
    } else {
        echo 'alert("Data Gagal di edit");window.location = "' . $baseURL . '/reparasi";';
    }
    echo '</script>';
}

/// hapus reparasi
if (isset($_POST['hapusReparasi'])) {
    $id_reparasi = $_POST['id_reparasi'];

    $prc = mysqli_query($koneksi, "DELETE FROM teknisi WHERE id_reparasi ='$id_reparasi'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di hapus");window.location = "' . $baseURL . '/reparasi";';
    } else {
        echo 'alert("Data Gagal di hapus");window.location = "' . $baseURL . '/reparasi";';
    }
    echo '</script>';
}
// end reparasi function

// pemusnahan function
/// get data aset rusak
$get_data_aset_rusak = mysqli_query($koneksi, "SELECT aset.kode_aset, aset.kategori, nama_aset.nama, laboratorium.ruangan, aset.status_aset, laboratorium.id_laboratorium AS id_lab, nama_aset.id_nama_aset AS id_namset FROM aset 
INNER JOIN nama_aset ON aset.nama = nama_aset.id_nama_aset 
INNER JOIN laboratorium ON aset.laboratorium = laboratorium.id_laboratorium 
WHERE aset.status_aset='rusak' AND aset.kode_aset NOT IN (SELECT kode_aset FROM pemusnah) ORDER BY aset.kode_aset ASC");
// get dara pemusnahan
$count_pemusnahan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_pemusnahan) as count_MUS FROM pemusnah;"))['count_MUS'];
$get_data_pemusnahan = mysqli_query($koneksi, "SELECT pemusnah.id_pemusnahan, pemusnah.kategori, nama_aset.nama, pemusnah.kode_aset, pemusnah.tgl_pemusnahan, pemusnah.metode
FROM pemusnah
INNER JOIN nama_aset ON pemusnah.nama = nama_aset.id_nama_aset");
/// tambah pemusnahan
if (isset($_POST['tambahPemusnahan'])) {
    $kode_aset = $_POST['mySelect'];
    $nama = $_POST['selectedIdNamset'];
    $kategori = $_POST['selectedKategori'];
    $tgl_pemusnahan = $_POST['tgl_pemusnahan'];
    $metode = $_POST['metode'];

    $cek_duplicate = mysqli_fetch_array(mysqli_query($koneksi, "SELECT kode_aset FROM pemusnah WHERE kode_aset='$kode_aset'"));

    // $prc = mysqli_query($koneksi,   "INSERT INTO pemusnah (id_pemusnahan, kategori, nama , kode_aset, tgl_pemusnahan, metode) 
    // VALUES ('', '$kategori', '$nama', '$kode_aset', '$tgl_pemusnahan', '$metode')");

    if (!is_null($cek_duplicate)) {
        echo '<script>alert("Data Sudah Ada!!!");window.location = "' . $baseURL . '/pemusnahan";</script>';
    } else {
        $prc = mysqli_query($koneksi, "INSERT INTO pemusnah (id_pemusnahan, kategori, nama , kode_aset, tgl_pemusnahan, metode)  VALUES ('', '$kategori', '$nama', '$kode_aset', '$tgl_pemusnahan', '$metode')");
        if ($prc == TRUE) {
            echo '<script> alert("Data Berhasil di input");window.location = "' . $baseURL . '/pemusnahan";</script>';
        } else {
            echo '<script>alert("Data Gagal di input");window.location = "' . $baseURL . '/pemusnahan";</script>';
        }
    }
}
/// edit pemusnahan 
if (isset($_POST['editPemusnahan'])) {
    $id_pemusnahan = $_POST['id_pemusnahan'];
    $tgl_pemusnahan = $_POST['tgl_pemusnahan'];

    $prc = mysqli_query($koneksi, "UPDATE pemusnah SET tgl_pemusnahan='$tgl_pemusnahan' WHERE id_pemusnahan='$id_pemusnahan'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di edit");window.location = "' . $baseURL . '/pemusnahan";';
    } else {
        echo 'alert("Data Gagal di edit");window.location = "' . $baseURL . '/pemusnahan";';
    }
    echo '</script>';
}

/// hapus pemusnahan
if (isset($_POST['hapusPemusnahan'])) {
    $id_pemusnahan = $_POST['id_pemusnahan'];

    $prc = mysqli_query($koneksi, "DELETE FROM pemusnah WHERE id_pemusnahan ='$id_pemusnahan'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di hapus");window.location = "' . $baseURL . '/pemusnahan";';
    } else {
        echo 'alert("Data Gagal di hapus");window.location = "' . $baseURL . '/pemusnahan";';
    }
    echo '</script>';
}

// end pemusnahan function

// function pengajuan
$get_data_pengajuan = mysqli_query(
    $koneksi,
    "SELECT kalab.id_ajuan, kalab.kategori, kalab.nama, kalab.jumlah, kalab.laboratorium, kalab.tgl_pengajuan, laboratorium.ruangan 
    FROM kalab
    JOIN laboratorium ON kalab.laboratorium = laboratorium.id_laboratorium"
);
/// tambah pengajuan
if (isset($_POST['tambahPengajuan'])) {
    $kategori = $_POST['kategori'];
    $nama_aset = $_POST['nama_aset'];
    $jumlah = $_POST['jumlah'];
    $laboratorium = $_POST['laboratorium'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];

    $prc = mysqli_query($koneksi, "INSERT INTO kalab (id_ajuan, kategori, nama, jumlah, laboratorium, tgl_pengajuan) VALUES ('', '$kategori', '$nama_aset', '$jumlah', '$laboratorium', '$tgl_pengajuan')");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di input");window.location = "' . $baseURL . '/pengajuan";';
    } else {
        echo 'alert("Data Gagal di input");window.location = "' . $baseURL . '/pengajuan";';
    }
    echo '</script>';
}

/// edit pengajuan
if (isset($_POST['editPengajuan'])) {
    $id_ajuan = $_POST['id_ajuan'];
    $jumlah = $_POST['jumlah'];
    $laboratorium = $_POST['laboratorium'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];

    $prc = mysqli_query($koneksi, "UPDATE kalab SET jumlah='$jumlah',laboratorium='$laboratorium',tgl_pengajuan='$tgl_pengajuan' WHERE id_ajuan='$id_ajuan'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di edit");window.location = "' . $baseURL . '/pengajuan";';
    } else {
        echo 'alert("Data Gagal di edit");window.location = "' . $baseURL . '/pengajuan";';
    }
    echo '</script>';
}
/// hapus pemusnahan
if (isset($_POST['hapuPengajuan'])) {
    $id_ajuan = $_POST['id_ajuan'];

    $prc = mysqli_query($koneksi, "DELETE FROM kalab WHERE id_ajuan='$id_ajuan'");

    echo '<script>';
    if ($prc == TRUE) {
        echo ' alert("Data Berhasil di hapus");window.location = "' . $baseURL . '/pengajuan";';
    } else {
        echo 'alert("Data Gagal di hapus");window.location = "' . $baseURL . '/pengajuan";';
    }
    echo '</script>';
}
