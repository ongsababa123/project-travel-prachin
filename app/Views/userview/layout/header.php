<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="<?= base_url('assets/fontgoogle.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('dist/sweetalert/sweetalert2.min.css'); ?>">
    <!-- CSS Files -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/paper-kit.css') ?>" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url('assets/demo/demo.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/demo/demo.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('aos-master/dist/aos.css') ?>" rel="stylesheet" />
</head>
<style>
    * {
        font-family: 'Kanit', sans-serif;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    
</style>

<body class="landing-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-info" color-on-scroll="300">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="<?= site_url('/') ?>" rel="tooltip" title="Coded by Creative Tim"
                    data-placement="bottom" style="font-size: medium">
                    หน้าหลัก
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" id="dropdown">
                        <a href="#" id="navbarDropdownMenu" data-toggle="dropdown" aria-haspopup="true"
                            style="font-size: medium" aria-expanded="false" class="nav-link">หมวดหมู่</i></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                            <a class="dropdown-item" style="font-size: medium" href="<?= site_url('/article') ?>">หมวดหมู่ทั้งหมด</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('/new') ?>" class="nav-link" style="font-size: medium"> ข่าวสาร</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="<?= base_url('assets/js/plugins/bootstrap-switch.js') ?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= base_url('assets/js/plugins/nouislider.min.js') ?>" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="<?= base_url('assets/js/plugins/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
    <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages, etc -->
    <script src="<?= base_url('assets/js/paper-kit.js?v=2.2.0') ?>" type="text/javascript"></script>
    <script src="<?= base_url('dist/sweetalert/sweetalert2.js'); ?>"></script>
    <script src="<?= base_url('aos-master/dist/aos.js') ?>"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>