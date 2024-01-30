<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url('dist/css/fontsgoogle.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('dist/sweetalert/sweetalert2.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="icon" href="<?= base_url('dist/img/icon/favicon.ico') ?>" type="image/gif">
    <link rel="stylesheet" href="<?= base_url('plugins/ekko-lightbox/ekko-lightbox.css'); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css'); ?>">
</head>
<style>
    /* เพิ่ม CSS ในส่วนนี้เพื่อกำหนดฟอนต์ให้กับทุกส่วนของหน้าเว็บไซต์ */
    * {
        font-family: 'Kanit', sans-serif;
    }

    th {
        background-color: #F5F6FA;
        text-align: center;
        border-bottom: none;
    }

    tbody {
        border-bottom: 10px solid #ccc;
        text-align: center;

    }

    .table thead th {
        border-bottom: none;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 40px;
        user-select: none;
        -webkit-user-select: none;
    }
</style>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <h2 class="display-4">is loading <i class="fa fa-sync fa-spin"></i></h2>
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <!-- info user -->
                    <div class="user-block">
                        <a class="nav-link " href="#" id="userDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img class="img-circle" src="<?= base_url('dist/img/avatar6.png'); ?>" alt="User Image">
                            <span class="username">
                                <?= session()->get('name_user') . ' ' . session()->get('lastname_user') ?>
                            </span>
                            <span class="description">แอดมิน</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <!-- Dropdown items go here -->
                            <a class="dropdown-item" href="<?= site_url('dashboard/profile/index'); ?>"> <i
                                    class="fas fa-id-card"></i>
                                ข้อมูลส่วนตัว
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link" href="<?= site_url('/dashboard/auth/logout'); ?>" role="button">
                                <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url('/dashboard/index'); ?>" class="brand-link">
                <span class="brand-text ml-1 ">ระบบการจัดการ</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">Home</li>
                        <li class="nav-item">
                            <a href="<?= site_url('/dashboard/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    หน้าหลัก
                                </p>
                            </a>
                        </li>
                        <div>
                            <hr>
                        </div>
                        <li class="nav-header">ระบบการจัดการ สมาชิก</li>
                        <li class="nav-item">
                            <a href="<?= site_url('/dashboard/user/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    ข้อมูลสมาชิก
                                </p>
                            </a>
                        </li>
                        <div>
                            <hr>
                        </div>
                        <li class="nav-header">ระบบการจัดการ บทความ</li>
                        <li class="nav-item">
                            <a href="<?= site_url('/dashboard/article/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    การจัดการบทความ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('/dashboard/article/add/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-plus-square"></i>
                                <p>
                                    เพิ่มบทความ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('/dashboard/category/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    การจัดการหมวดหมู่
                                </p>
                            </a>
                        </li>
                        <div>
                            <hr>
                        </div>
                        <li class="nav-header">ระบบการจัดการ ข่าวสาร</li>
                        <li class="nav-item">
                            <a href="<?= site_url('/dashboard/news/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-scroll"></i>
                                <p>
                                    การจัดการข่าวสาร
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('/dashboard/news/add/index'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>
                                    เพิ่มข่าวสาร
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dist/js/adminlte.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('dist/js/demo.js'); ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('dist/sweetalert/sweetalert2.js'); ?>"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/filterizr/jquery.filterizr.min.js') ?>"></script>
    <script src="<?= base_url('plugins/ekko-lightbox/ekko-lightbox.min.js') ?>"></script>
    <!-- Select2 -->
    <script src="<?= base_url('plugins/select2/js/select2.full.min.js'); ?>"></script>
    <!-- Summernote -->
    <script src="<?= base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.btn[data-filter]').on('click', function () {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
    <body>
</html>