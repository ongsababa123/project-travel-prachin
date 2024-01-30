<title>เพิ่มบทความ</title>

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
                        <h1>เพิ่มบทความ
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/dashboard/index'); ?>">หน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a
                                    href="<?= site_url('/dashboard/article/index'); ?>">การจัดการบทความ</a></li>
                            <li class="breadcrumb-item active"><a>เพิ่มบทความ</a></li>
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
                                <form class="mb-3" id="form_price_late" action="javascript:void(0)" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <label>ภาพหน้าปกบทความ</label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-2 mx-auto text-center border">
                                                        <a href="<?= base_url('dist/img/image-preview.png') ?>"
                                                            data-toggle="lightbox" id="image-preview-extra-">
                                                            <img class="img-fluid mb-2"
                                                                src="<?= base_url('dist/img/image-preview.png') ?>"
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>หัวข้อบทความ</label>
                                                <textarea name="title" id="title" cols="5" rows="8"
                                                    class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>เวลาเปิด-ปิด</label>
                                                <textarea name="title" id="title" cols="5" rows="5"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>หมวดหมู่</label>
                                                <select class="form-control select2" style="width: 100%; height: 40px"
                                                    id="category" name="category">
                                                    <option selected="selected" value="">เลือกหมวดหมู่</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>ลิ้งค์ google map</label>
                                                <input type="text" name="map" id="map" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>สถานที่</label>
                                                <input type="text" name="location" id="location" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>ค่าเข้าสถานที่</label>
                                                <input type="text" name="location" id="location" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>ชื่อ facebook</label>
                                                        <input type="text" name="name_facebook" id="name_facebook"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>ลิ้งค์ facebook</label>
                                                        <input type="text" name="link_facebook" id="link_facebook"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>เนื้อหาในบทความ</label>
                                            <textarea class="form-control" type="text" placeholder=""
                                                name="topic_create" id="summernote1"></textarea>
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
            });
        })
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