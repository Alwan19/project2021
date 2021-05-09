<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Pengajuan TA | <?= $title ?></title>

    <link href="<?= base_url() ?>assets/image/logoamp.png" rel="icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?= base_url() ?>assets/admin/html/dist/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/admin/html/dist/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/admin/html/dist/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?= base_url() ?>assets/admin/html/dist/assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="<?= base_url() ?>assets/admin/html/dist/assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.html">Pengajuan Judul <br> TA</a>
        </div>
        <form id="login-form" action="<?= base_url('login') ?>" method="post">
            <h2 class="login-title">Login</h2>

            <?php
            //Notifikasi
            echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            ?>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="text" name="username" placeholder="Username/Nim" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>

            <div class="text-center">Belum mempunyai akun?
                <a class="color-blue" href="<?= base_url('login/register') ?>">Daftar</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="<?= base_url() ?>assets/admin/html/dist/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/admin/html/dist/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/admin/html/dist/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="<?= base_url() ?>assets/admin/html/dist/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?= base_url() ?>assets/admin/html/dist/assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>