<?php
include 'backend/includes.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= $baseURL; ?>/assets/images/fav.svg" />
    <title>APALKOM | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $baseURL; ?>/assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <img src="<?= $baseURL; ?>/assets/images/logosma.png" alt="" width="200">
    <div class="login-box">
        <div class="login-logo">
            <a class="font-weight-bold" href="<?= $baseURL; ?>/login.php"><i class="fas fa-cogs"></i> <b>APAL</b>KOM</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan username dan password</p>
                <!-- Form Login -->
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" autofocus required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block" name="btnLogin">Masuk</button>
                    </div>
                </form>
                <!-- end Form Login -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?= $baseURL; ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= $baseURL; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $baseURL; ?>/assets/js/adminlte.min.js"></script>
</body>

</html>