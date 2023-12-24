<?php
// Set timezone ke Waktu Indonesia Barat (WIB)
date_default_timezone_set('Asia/Jakarta');

// Array nama bulan dalam bahasa Indonesia
$namaBulan = array(
    "Januari", "Februari", "Maret", "April",
    "Mei", "Juni", "Juli", "Agustus",
    "September", "Oktober", "November", "Desember"
);

// Mendapatkan tanggal saat ini
$tanggalSekarang = date("j");
// Mendapatkan nama bulan dalam bahasa Indonesia
$bulanSekarang = $namaBulan[date("n") - 1];
// Mendapatkan tahun saat ini
$tahunSekarang = date("Y");

// Membuat format tanggal dalam bahasa Indonesia
$tanggalIndonesia = $tanggalSekarang . ' ' . $bulanSekarang . ' ' . $tahunSekarang;

// Menampilkan tanggal dalam bahasa Indonesia
echo "Tanggal hari ini dalam bahasa Indonesia: " . $tanggalIndonesia;
