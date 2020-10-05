<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- add icon link -->
    <link rel="icon" href="<?= base_url('images') ?>/foto/alkayis.jpg" type="image/x-icon">
    <!-- Font Awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?= base_url('dashboard/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('dashboard/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('dashboard/') ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dashboard/') ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('dashboard/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('dashboard/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('dashboard/') ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('dashboard/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('dashboard/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- jQuery -->
    <script src="<?= base_url('dashboard/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('dashboard/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Yayasan Al kayis</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('mydashboard/myprofile') ?>" class="dropdown-item">
                            <i class="fa fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                            <i class="fa fa-power-off mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('images') ?>/foto/alkayis.jpg" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Al kayis</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block text-capitalize"><?= $nama; ?></a>
                        <a href="#" class="d-block text-capitalize">( <?= $jabatan; ?> )</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?php if ($jabatan == 'Admin') { ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('mydashboard/beranda_admin') ?>"
                                class="nav-link <?= $aktive = ($crumb == 'Beranda') ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('mydashboard/data_kotak') ?>"
                                class="nav-link <?= $aktive = ($crumb == 'Kotak') ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-check-square"></i>
                                <p>
                                    Kotak Amal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('mydashboard/buku_kas') ?>"
                                class="nav-link <?= $aktive = ($crumb == 'Buku Kas') ? 'active' : ''; ?> ">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Buku Kas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('mydashboard/data_user') ?>"
                                class="nav-link <?= $aktive = ($crumb == 'User') ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Pengguna
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link ">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Laporan Keuangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('auth/logout') ?>" class="nav-link ">
                                <i class="nav-icon fa fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php } else { ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('mydashboard/beranda_petugas') ?>"
                                class="nav-link <?= $aktive = ($crumb == 'Beranda') ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('mydashboard/scaning_form') ?>"
                                class="nav-link <?= $aktive = ($crumb == 'Scanning') ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-check-square"></i>
                                <p>
                                    scanning
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kotak/manual_form') ?>"
                                class="nav-link  <?= $aktive = ($crumb == 'Form Input Dana') ? 'active' : ''; ?> ">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Input Manual
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('mydashboard/data_input') ?>"
                                class="nav-link  <?= $aktive = ($crumb == 'Data input Kotak Amal') ? 'active' : ''; ?> ">
                                <i class="nav-icon fa fa-th-list"></i>
                                <p>
                                    Data input
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('auth/logout') ?>" class="nav-link ">
                                <i class="nav-icon fa fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

                <?php } ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0 text-dark"><?= $jabatan; ?> - Al kayis</h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $crumb; ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->


                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main content -->
                    <?= $contens; ?>
                    <!-- /.content -->
                </div><!-- /.container-fluid -->
            </section>

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Created &copy; <?= date("Y"); ?> <a href="http://adminlte.io">Hamzahbersaudara.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('dashboard/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('dashboard/') ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('dashboard/') ?>plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('dashboard/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('dashboard/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('dashboard/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('dashboard/') ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('dashboard/') ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('dashboard/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="<?= base_url('dashboard/') ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('dashboard/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dashboard/') ?>dist/js/adminlte.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('dashboard'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('dashboard'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('dashboard'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('dashboard'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('dashboard/') ?>dist/js/pages/dashboard.js"></script>
    <script src="<?= base_url('assets/') ?>digit_nominal.js"></script>
    <script src="<?= base_url('assets/') ?>table.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('dashboard/') ?>dist/js/demo.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/webcam/js/qrcodelib.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/webcam/js/webcodecamjquery.js"></script>
    <script type="text/javascript">
    var arg = {
        resultFunction: function(result) {
            //$('.hasilscan').append($('<input name="noijazah" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
            // $.post("../cek.php", { noijazah: result.code} );
            var redirect = '<?= base_url('kotak/input_dana') ?>';
            $.redirectPost(redirect, {
                kode_kotak: result.code
            });
        }
    };

    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu('select', 1)
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
        
    */
    $('select').on('change', function() {
        decoder.stop().play();
    });

    // jquery extend function
    $.extend({
        redirectPost: function(location, args) {
            var form = '';
            $.each(args, function(key, value) {
                form += '<input type="hidden" name="' + key + '" value="' + value + '">';
            });
            $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body')
                .submit();
        }
    });
    </script>



</body>

</html>