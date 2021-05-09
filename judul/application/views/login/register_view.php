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
        <form id="register-form" action="<?= base_url('login/register') ?>" method="post">
            <h2 class="login-title">Daftar</h2>
            <?php
            //Notifikasi
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            ?>
            <div class="form-group">
                <input class="form-control" type="text" name="nim" placeholder="Nim">
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="nama" placeholder="Nama Mahasiswa" autocomplete="off">
            </div>

            <div class="form-group">
                <select class="form-control" name="jenis kelamin" id="jenis_kelamin" required>
                    <option>--- Pilih Jenis Kelamin ---</option>
                    <option <?php if (set_value('jenis_kelamin') == 'Laki-laki') {
                                echo 'selected';
                            } ?>>Laki-laki</option>
                    <option <?php if (set_value('jenis_kelamin') == 'Perempuan') {
                                echo 'selected';
                            } ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="ulangi_password" placeholder="Ulangi Password">
            </div>

            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Sign up</button>
            </div>

            <div class="text-center">Sudah mempunyai akun?
                <a class="color-blue" href="<?= base_url('login') ?>">Login</a>
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
            $('#register-form').validate({
                errorClass: "help-block",
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2
                    },
                    last_name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        confirmed: true
                    },
                    password_confirmation: {
                        equalTo: password
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