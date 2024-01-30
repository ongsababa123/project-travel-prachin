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
                                        data-toggle="modal" data-target="#modal-default"
                                        onclick="load_modal(1)">สร้างหมวดหมู่</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="type_travel_table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ลําดับ</th>
                                                    <th>ชื่อหมวดหมู่</th>
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
    <div class="modal fade" id="modal-default">
        <div id="crud_category">
            <?= $this->include("modal/crud_category"); ?>
        </div>
    </div>
    <script>
        function load_modal(load_check, data_encode) {
            crud_category = document.getElementById("crud_category");
            $(".modal-body #name_travel").val('');

            if (load_check == 1) {
                crud_category.style.display = "block";
                $('#customSwitch_status').hide();

                $(".modal-header #title_modal").text("สร้างข้อมูลหมวดหมู่");
                $(".modal-footer #submit").text("สร้างข้อมูลหมวดหมู่");
                $(".modal-body #url_route").val("dashboard/type_travel/create");
            } else if (load_check == 2) {
                $('#customSwitch_status').show();
                crud_category.style.display = "block";
                const rowData = JSON.parse(decodeURIComponent(data_encode));
                const customSwitch3 = $(".modal-body #customSwitch3");
                const labelCustomSwitch3 = $(".modal-body #LabelcustomSwitch3");
                console.log(rowData.status);
                labelCustomSwitch3.text(rowData.status == 1 ? "เปิดใช้งาน" : "ปิดใช้งาน");
                if (rowData.status == '1') {
                    customSwitch3.prop('checked', true);
                } else {
                    customSwitch3.prop('checked', false);
                }
                $(".modal-body #name_travel").val(rowData.name_travel);

                $(".modal-header #title_modal").text("แก้ไขข้อมูลหมวดหมู่");
                $(".modal-footer #submit").text("แก้ไขข้อมูลหมวดหมู่");
                $(".modal-body #url_route").val("dashboard/type_travel/edit/" + rowData.id_type_travel);
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            getTableData();
        });
        function getTableData() {
            if ($.fn.DataTable.isDataTable('#type_travel_table')) {
                $('#type_travel_table').DataTable().destroy();
            }
            $('#type_travel_table').DataTable({
                "processing": $("#customer_Table .overlay").show(),
                "pageLength": 10,
                "pagingType": "full_numbers", // Display pagination as 1, 2, 3... instead of Previous, Next buttons
                'serverSide': true,
                'ajax': {
                    'url': "<?php echo site_url('dashboard/type_travel/getdata'); ?>",
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
                        $('#type_travel_table tbody').html(`
                        <tr>
                            <td colspan="6" class="text-center">
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
                            return data.name_travel;
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
                            const encodedRowData = encodeURIComponent(JSON.stringify(row));
                            return `<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="load_modal(2,'${encodedRowData}')">แก้ไขข้อมูล</button>`;
                        }
                    },
                ]
            });
            $('[data-toggle="tooltip"]').tooltip();
        }
    </script>
    <script>
        function action_(url, form) {
            var formData = new FormData(document.getElementById(form));
            $.ajax({
                url: '<?= base_url() ?>' + url,
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                beforeSend: function () {
                    // Show loading indicator here
                    var loadingIndicator = Swal.fire({
                        title: 'กําลังดําเนินการ...',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        showConfirmButton: false,
                    });
                },
                success: function (response) {
                    Swal.close();
                    if (response.success) {
                        Swal.fire({
                            title: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            allowOutsideClick: true
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
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: true
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: "เกิดข้อผิดพลาด",
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showConfirmButton: true
                    });
                }
            });
        }
    </script>