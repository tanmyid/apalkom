<?php
// cek login bolo
include 'backend/includes.php';
if (isset($_SESSION['login']) == 'true') {
} else {
    echo '<script>';
    echo ' alert("Anda Belum Login");window.location = "' . $baseURL . '/login";';
    echo '</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if ($dynamic_title !== "Index") {
                echo $dynamic_title;
            } else {
                echo 'Dashboard';
            } ?></title>
    <link rel="icon" href="<?= $baseURL; ?>/assets/images/fav.svg" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">