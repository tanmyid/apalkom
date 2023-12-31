<?php
// Laragon Domain = apalkom.dev
// set baseURL
// $baseURL = 'http://localhost/apalkom';
$baseURL = '';

// Koneksi Database
$koneksi = mysqli_connect('localhost', 'root', '', 'apalkom');

// Dynamic Title 
$dynamic_title = ucwords(str_replace("_", " ", basename(pathinfo($_SERVER['PHP_SELF'])['basename'], ".php")));


// arsip
// $cek_count = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kode_aset) as KD FROM aset;"))['KD'];
// $non_elektronik_0 = "AST-NE-" . sprintf("%04d", mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kode_aset) as KD FROM aset;"))['KD'] + 1, 3, 3);
// $elektronik_0 = "AST-E-" . sprintf("%04d", mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kode_aset) as KD FROM aset;"))['KD'] + 1, 3, 3);
// <script type="text/javascript">
//     function getSelectedOption() {
//         // Mendapatkan elemen <select>
//         var selectElement = document.getElementById("mySelect");

//         // Mendapatkan indeks opsi yang dipilih
//         var selectedIndex = selectElement.selectedIndex;

//         // Mendapatkan nilai (value) dari opsi yang dipilih
//         var selectedValue = selectElement.options[selectedIndex].value;

//         // Jika Anda ingin mendapatkan teks (string) dari opsi yang dipilih, gunakan innerHTML
//         var selectedText = selectElement.options[selectedIndex].innerHTML;

//         // Menampilkan nilai dan teks yang dipilih pada form input
//         document.getElementById("kode_aset").value = selectedValue;
//         document.getElementById("kategori_aset").value = selectedText;
//     }
// </script>