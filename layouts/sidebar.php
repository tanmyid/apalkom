<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <?php
                if ($_SESSION['level'] == 'kalab') {
                    echo '<img src="' . $baseURL . '/assets/images/kalab.png" class="user-image img-circle elevation-2" alt="Ka. Lab">';
                } else {
                    echo '<img src="' . $baseURL . '/assets/images/laboran.png" class="user-image img-circle elevation-2" alt="Laboran">';
                }
                ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right mt-3">
                <!-- User image -->
                <li class="user-header bg-dark">
                    <?php
                    if ($_SESSION['level'] == 'kalab') {
                        echo '<img src="' . $baseURL . '/assets/images/kalab.png" class="user-image img-circle elevation-2" alt="Ka. Lab">';
                    } else {
                        echo '<img src="' . $baseURL . '/assets/images/laboran.png" class="user-image img-circle elevation-2" alt="Laboran">';
                    }
                    ?>
                    <p>
                        <?= $_SESSION['nama']; ?> - <?php
                                                    if ($_SESSION['level'] == 'kalab') {
                                                        echo 'Ka. Laboratorium';
                                                    } else {
                                                        echo 'Laboran';
                                                    }

                                                    ?>
                        <small>APALKOM</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <form action="" method="post">
                    <li class="user-footer p-2 m-2">

                        <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#profile">Profil</button>
                        <button type="submit" class="btn btn-default btn-flat float-right" name="btnLogout">Logout</button>
                    </li>
                </form>
            </ul>
        </li>
    </ul>
</nav>
<!-- Modal Profile -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center mb-3">
                            <?php
                            if ($_SESSION['level'] == 'kalab') {
                                echo '<img src="' . $baseURL . '/assets/images/kalab.png" class="img-circle" height="150" width="150" alt="Ka. Lab">';
                            } else {
                                echo '<img src="' . $baseURL . '/assets/images/laboran.png" class="img-circle" height="150" width="150" alt="Laboran">';
                            }
                            ?>
                        </div>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nama : </b> <a class="float-right"><?= $_SESSION['nama']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jabatan : </b> <a class="float-right"><?php
                                                                            if ($_SESSION['level'] == 'kalab') {
                                                                                echo 'Ka. Laboratorium';
                                                                            } else {
                                                                                echo 'Laboran';
                                                                            } ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Petugas Lab : </b> <a class="float-right">1</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Profile -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $baseURL; ?>" class="brand-link text-center">
        <span class="brand-text font-weight-bold"><i class="fas fa-cogs"></i> APALKOM APP</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <?php
                if ($_SESSION['level'] == 'laboran') {
                    echo '<li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/nama_aset" class="nav-link">';
                    echo '                        <i class="nav-icon fas fa-box-open"></i>';
                    echo '                        <p>';
                    echo '                            Nama Aset';
                    echo '                            <span class="badge badge-secondary right">' . $count_nama_aset . '</span>';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                    echo '                <li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/data_aset" class="nav-link">';
                    echo '                        <i class="nav-icon fas fa-boxes"></i>';
                    echo '                        <p>';
                    echo '                            Data Aset <span class="badge badge-success right">' . $count_data_aset . '</span>';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                    echo '                <li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/reparasi" class="nav-link">';
                    echo '                        <i class="nav-icon fas fa-wrench"></i>';
                    echo '                        <p>';
                    echo '                            Kondisi Aset';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                    echo '                <li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/pemusnahan" class="nav-link">';
                    echo '                        <i class="nav-icon fas fa-fire"></i>';
                    echo '                        <p>';
                    echo '                            Pemusnahan';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                    echo '                <li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/laboratorium" class="nav-link">';
                    echo '                        <i class="nav-icon fas fa-flask"></i>';
                    echo '                        <p>';
                    echo '                            Laboratorium';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/pengajuan" class="nav-link">';
                    echo '                        <i class="nav-icon far fa-image"></i>';
                    echo '                        <p>';
                    echo '                            Pengajuan';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                    echo '<li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/laporan" class="nav-link">';
                    echo '                        <i class="nav-icon far fa-file"></i>';
                    echo '                        <p>';
                    echo '                            Laporan';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                    echo '                <li class="nav-header">OPTION</li>';
                    echo '                <li class="nav-item">';
                    echo '                    <a href="' . $baseURL . '/kelola_user" class="nav-link">';
                    echo '                        <i class="nav-icon far fa-user"></i>';
                    echo '                        <p>';
                    echo '                            Kelola User <span class="badge badge-info right">' . $count_user . '</span>';
                    echo '                        </p>';
                    echo '                    </a>';
                    echo '                </li>';
                    echo '            </ul>';
                }
                ?>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <div class="sidebar-custom mt-2 text-center">
        <span class="text-md text-white">Login as : <?= strtoupper($_SESSION['level']); ?></span>

    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>