<title>การจัดการหมวดหมู่</title>

<style>
    .col-lg-custome {
        -ms-flex: 0 0 16.666667%;
        flex: 1 0 19.666667%;
        max-width: 20.666667%;
    }
</style>

<body class="hold-transition sidebar-mini">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>การจัดการหมวดหมู่
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/dashboard/index'); ?>">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active"><a>การจัดการหมวดหมู่</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-navy card-tabs">
                            <div class="card-header">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-block-tool btn-success btn-sm"
                                        data-toggle="modal" data-target="#modal-default" onclick="load_modal(1)">สร้างหมวดหมู่</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ลําดับ</th>
                                                    <th>ชื่อหมวดหมู่</th>
                                                    <th>จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>ชื่อหมวดหมู่</td>
                                                    <td> <button type="button"
                                                            class="btn btn-block-tool btn-warning btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#modal-default">แก้ไขบทความ</button>
                                                        <button type="button"
                                                            class="btn btn-block-tool btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#modal-default">ลบบทความ</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="modal-default">
        <div id="crud_category">
            <?= $this->include("modal/crud_category"); ?>
        </div>
    </div>
    <script>
        function load_modal(load_check, data_encode) {
            crud_category = document.getElementById("crud_category");
            $(".modal-body #category_name").val('');

            if (load_check == 1) {
                crud_category.style.display = "block";
                $('#customSwitch_status').hide();

                $(".modal-header #title_modal").text("สร้างข้อมูลผู้ใช้");
                $(".modal-footer #submit").text("สร้างข้อมูลผู้ใช้");
                $(".modal-body #url_route").val("dashboard/customer/create/4");
            } else if (load_check == 2) {
                $('#customSwitch_status').show();
                crud_category.style.display = "block";

                $(".modal-header #title_modal").text("จัดการผู้ใช้งาน");
                $(".modal-footer #submit").text("บันทึกข้อมูล");
            }
        }
    </script>