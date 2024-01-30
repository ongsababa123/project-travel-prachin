<title>การจัดการข่าวสาร</title>

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
                        <h1>การจัดการข่าวสาร
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/dashboard/index'); ?>">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active"><a>การจัดการข่าวสาร</a></li>
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
                                        data-toggle="modal" data-target="#modal-default">สร้างข่าวสาร</button>
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
                                                    <th>หัวข้อข่าวสาร</th>
                                                    <th>วันที่สร้าง</th>
                                                    <th>วันที่แก้ไข (ล่าสุด)</th>
                                                    <th>จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>หัวข้อข่าวสาร</td>
                                                    <td>วันที่สร้าง</td>
                                                    <td>วันที่แก้ไข</td>
                                                    <td> <button type="button"
                                                            class="btn btn-block-tool btn-warning btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#modal-default">แก้ไขข่าวสาร</button>
                                                        <button type="button"
                                                            class="btn btn-block-tool btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#modal-default">ลบข่าวสาร</button>
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