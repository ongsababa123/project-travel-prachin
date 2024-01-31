<title>แก้ไขข่าวสาร</title>

<style>
    .col-lg-custome {
        -ms-flex: 0 0 16.666667%;
        flex: 1 0 19.666667%;
        max-width: 20.666667%;
    }
</style>
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">

<body class="hold-transition sidebar-mini">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>แก้ไขข่าวสาร
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/dashboard/index'); ?>">หน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a
                                    href="<?= site_url('/dashboard/news/index'); ?>">การจัดการข่าวสาร</a></li>
                            <li class="breadcrumb-item active"><a>แก้ไขข่าวสาร</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card" id="late-price_Table">
                            <div class="card-header bg-navy">
                                <h2 class="card-title"></h2>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="mb-3" id="form_edit_news" action="javascript:void(0)" method="post"
                                    enctype="multipart/form-data">
                                    <label for="">สถานะบทความ</label>
                                    <div class="row">
                                        <?php
                                        $status_1 = ($data_news['status'] == 1) ? "checked" : "";
                                        $status_2 = ($data_news['status'] == 0) ? "checked" : "";
                                        ?>
                                        <div class="col-sm-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" class="score-radio" id="answer_5" name="status"
                                                    value="1" <?= $status_1 ?>>
                                                <label for="answer_5" id="label_answer_5">เปิดใช้งาน</label>
                                            </div>
                                            <div class="icheck-danger d-inline">
                                                <input type="radio" class="score-radio" id="answer_6" name="status"
                                                    value="0" <?= $status_2 ?>>
                                                <label for="answer_6" id="label_answer_6">ปิดใช้งาน</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <label>ภาพหน้าปกข่าวสาร</label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-2 mx-auto text-center border">
                                                        <a href="data:image/jpeg;base64,<?= $data_news['pic_topic'] ?>"
                                                            data-toggle="lightbox" id="image-preview-extra-">
                                                            <img class="img-fluid mb-2"
                                                                src="data:image/jpeg;base64,<?= $data_news['pic_topic'] ?>"
                                                                alt="white sample" id="image-preview-" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-2" id="upload">
                                                <label for="uploadImage"
                                                    class="btn btn-block-tool btn-success btn-sm mb-2">อัปโหลดรูป</label>
                                                <input type="file" id="uploadImage" name="uploadImage"
                                                    style="display: none;" accept="image/*"
                                                    onchange="previewImage(this);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>หัวข้อข่าวสาร</label>
                                                <textarea name="topic_news" id="topic_news" cols="5" rows="5"
                                                    class="form-control"><?= $data_news['topic_news'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>เนื้อหาในข่าวสาร</label>
                                            <textarea class="form-control" type="text" placeholder=""
                                                name="detail"
                                                id="summernote1"><?= $data_news['detail'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center" id="btn_price_late">
                                        <button type="submit" class="btn btn-success" name="submit" value="Submit"
                                            id="submit">บันทึก</button>
                                        <button type="button" class="btn btn-danger">ยกเลิก</button>
                                    </div>
                                </form>
                            </div>
                            <div class="overlay dark">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function () {
            $(".overlay").hide();
            $('.select2').select2();

            $("#summernote1").summernote({
                toolbar: [
                    ['font', ['bold', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['picture']],
                ],
                placeholder: 'กรอกเนื้อหาในบทความ',
            },);
        })

        $("#form_edit_news").on('submit', function (e) {
            e.preventDefault();
            action_('dashboard/news/edit/<?= $data_news['id_news'] ?>', 'form_edit_news');
        });
    </script>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('image-preview-');
            var preview_extra = document.getElementById('image-preview-extra-');
            var file = input.files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
                preview_extra.href = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
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
                    console.log(response);
                    if (response.success) {
                        Swal.fire({
                            title: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            allowOutsideClick: true,
                        });
                        setTimeout(() => {
                            if (response.reload) {
                                window.location.reload();
                            }
                        }, 2000);
                    } else {
                        Swal.fire({
                            title: response.message,
                            icon: 'error',
                            confirmButtonText: "ตกลง",
                            showConfirmButton: true,
                            width: '55%'
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