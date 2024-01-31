<title>การจัดการบทความ</title>

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
                        <h1>การจัดการบทความ
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/dashboard/index'); ?>">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active"><a>การจัดการบทความ</a></li>
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
                            <div class="card-header bg-lightblue">
                                <h4 class="card-title">
                                    <div class="row">
                                        <div class="col-10 text-center">
                                            <label for="type_travel">เลือกหมวดหมู่</label>
                                            <div class="form-group">
                                                <select name="type_travel" id="type_travel" class="form-control">
                                                    <option value="0">ทั้งหมด</option>
                                                    <?php foreach ($data_type_travel as $key => $value): ?>
                                                        <option value="<?= $value['id_type_travel'] ?>">
                                                            <?= $value['name_travel'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <label for="">&nbsp;</label>
                                            <button type="submit" class="btn btn-dark"
                                                onclick="getTableData()">ค้นหา</button>
                                        </div>
                                    </div>
                                </h4>
                                <br>
                                <div class="card-tools">
                                    <a type="button" class="btn btn-block-tool btn-dark btn-sm" href="<?= site_url('/dashboard/article/add/index'); ?>" target="_blank">เพิ่มบทความ</a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="type_article_table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ลําดับ</th>
                                                    <th>หัวข้อ</th>
                                                    <th>ประเภท</th>
                                                    <th>วันที่สร้าง</th>
                                                    <th>วันที่แก้ไข (ล่าสุด)</th>
                                                    <th>สถานะ</th>
                                                    <th>จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
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
    <script>
        $(document).ready(function () {
            getTableData();
        });
        function getTableData() {
            var type_travel = $("#type_travel").val();
            if ($.fn.DataTable.isDataTable('#type_article_table')) {
                $('#type_article_table').DataTable().destroy();
            }
            $('#type_article_table').DataTable({
                "processing": $("#customer_Table .overlay").show(),
                "pageLength": 10,
                "pagingType": "full_numbers", // Display pagination as 1, 2, 3... instead of Previous, Next buttons
                'serverSide': true,
                'ajax': {
                    'url': "<?php echo site_url('dashboard/article/getdata/'); ?>" + type_travel,
                    'type': 'GET',
                    'dataSrc': 'data',
                },
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "ordering": false,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
                "drawCallback": function (settings) {
                    $("#customer_Table .overlay").hide();
                    var daData = settings.json.data;
                    if (daData.length == 0) {
                        $('#type_article_table tbody').html(`
                        <tr>
                            <td colspan="7" class="text-center">
                                ยังไม่มีข้อมูล
                            </td>
                        </tr>`
                        );
                    }
                },
                'columns': [
                    {
                        'data': null,
                        'class': 'text-center',
                        'render': function (data, type, row, meta) {
                            return meta.settings.oAjaxData.start += 1;
                        }
                    },
                    {
                        'data': null,
                        'class': 'text-center',
                        'render': function (data, type, row, meta) {
                            return data.topic;
                        }
                    },
                    {
                        'data': null,
                        'class': 'text-center',
                        'render': function (data, type, row, meta) {
                            return data.type_travel.name_travel;
                        }
                    },
                    {
                        'data': null,
                        'class': 'text-center',
                        'render': function (data, type, row, meta) {
                            return data.data_create;
                        }
                    }, {
                        'data': null,
                        'class': 'text-center',
                        'render': function (data, type, row, meta) {
                            return data.data_edit;
                        }
                    },
                    {
                        'data': null,
                        'class': 'text-center',
                        'render': function (data, type, row, meta) {
                            if (data.status == 1) {
                                return `<span class='badge bg-success'>ใช้งาน</span>`;
                            } else if (data.status == 0) {
                                return `<span class='badge bg-danger'>ปิดใช้งาน</span>`;
                            }
                        }
                    },
                    {
                        'data': null,
                        'class': 'text-center',
                        'render': function (data, type, row, meta) {
                            return `<a type="button" class="btn btn-warning" target="_blank" href="<?= base_url('dashboard/article/edit/index/'); ?>${data.id_article}">แก้ไขข้อมูล</a>
                            <button type="button" class="btn btn-danger" onclick="confirm_Alert('ต้องการลบข้อมูลนี้ใช่หรือไม่ ?','dashboard/article/delete/${data.id_article}')"><i class="fas fa-trash"></i> ลบข้อมูล</button>`;
                        }
                    },
                ]
            });
            $('[data-toggle="tooltip"]').tooltip();
        }
    </script>
    <script>
        function confirm_Alert(text, url) {
            Swal.fire({
                title: text,
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: "ยกเลิก",
                confirmButtonColor: "#28a745",
                confirmButtonText: "ตกลง",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url() ?>' + url,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        beforeSend: function () {
                            // Show loading indicator here
                            var loadingIndicator = Swal.fire({
                                title: 'กําลังดําเนินการ...',
                                allowEscapeKey: false,
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                        },
                    }).done(function (response) {
                        Swal.close();
                        if (response.success) {
                            Swal.fire({
                                title: response.message,
                                icon: 'success',
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                if (response.reload) {
                                    getTableData();
                                }
                            }, 2000);
                        } else {
                            Swal.fire({
                                title: response.message,
                                icon: 'error',
                                confirmButtonText: "ตกลง",
                                showConfirmButton: true
                            });
                        }
                    });
                }
            });
        }
    </script>