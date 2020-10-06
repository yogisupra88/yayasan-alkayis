<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Al Kayis | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('images') ?>/foto/alkayis.jpg" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('dashboard'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('dashboard'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dashboard'); ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page bg-light">
    <div class="login-box text-light">
        <div class="login-logo">
            <a href="#"><b class="text-info">Yayasan Al Kayis</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body bg-primary">
                <p class="login-box-msg">Login User</p>
                <!-- Alert -->
                <?php
                echo $this->session->flashdata('pesan');
                ?>
                <!-- eND Alert -->

                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="Username" name="username"
                            value="<?= set_value('username'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text bg-light">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-light"> <?= form_error('username'); ?></small>

                    <div class="input-group mt-3">
                        <input type="password" class="form-control" id="password_input" placeholder="Password"
                            name="password">
                        <div class="input-group-append">
                            <div class="input-group-text bg-light">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-light"> <?= form_error('password'); ?></small>

                    <div class="row">
                        <div class="col-8 mt-3">
                            <div class="icheck-primary ">
                                <input type="checkbox" id="remember" onclick="myFunction()">
                                <label for="remember">
                                    Show Password
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4 mt-3">
                            <button type="submit" class="btn btn-danger btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('dashboard'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('dashboard'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dashboard'); ?>/dist/js/adminlte.min.js"></script>

    <script>
    function myFunction() {
        var x = document.getElementById("password_input");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>


</body>

</html>