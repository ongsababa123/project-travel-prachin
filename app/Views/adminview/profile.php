<title>ข้อมูลส่วนตัว</title>
<link rel="stylesheet" href="<?= base_url('plugins/ekko-lightbox/ekko-lightbox.css'); ?>">


<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ข้อมูลส่วนตัว</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/dashboard/index'); ?>">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card" id="history_user">
                            <div class="card-header">
                                <h2 class="card-title"></h2>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-3">
                                        <!-- Profile Image -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    <img class="profile-user-img img-fluid img-circle"
                                                        src="<?= base_url('dist/img/avatar6.png'); ?>"
                                                        alt="User profile picture">
                                                </div>
                                                <h3 class="profile-username text-center">
                                                    <?= $data_user[0]['name_user'] . ' ' . $data_user[0]['lastname_user'] ?>
                                                </h3>

                                                <p class="text-muted text-center">แอดมิน </p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Email</b> <a class="float-right">
                                                            <?= $data_user[0]['email_user'] ?>
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Phone</b> <a class="float-right">
                                                            <?= $data_user[0]['phone'] ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <a href="#" class="btn btn-primary btn-block" data-toggle="modal"
                                                    data-target="#modal-default"
                                                    onclick="load_modal(1)"><b>แก้ไขข้อมูล</b></a>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="modal-default">
        <div id="crud_user">
            <?= $this->include("modal/crud_user"); ?>
        </div>
    </div>
    <script>
        function load_modal(load_check) {
            crud_user = document.getElementById("crud_user");
            $(".modal-body #name_user").val('');
            $(".modal-body #lastname_user").val('');
            $(".modal-body #email_user").val('');
            $(".modal-body #phone").val('');
            $(".modal-body #password").val('');

            $('#showPassword').prop('checked', false);
            if (load_check == 1) {
                crud_user.style.display = "block";
                $(".modal-body #name_user").val('<?= $data_user[0]['name_user'] ?>');
                $(".modal-body #lastname_user").val('<?= $data_user[0]['lastname_user'] ?>');
                $(".modal-body #email_user").val('<?= $data_user[0]['email_user'] ?>');
                $(".modal-body #phone").val('<?= $data_user[0]['phone'] ?>');
                $('#customSwitch_status').hide();
                $("#password").prop("disabled", true);
                $('#changePasswordCheckbox').show();
                $('#showPasswordCheckbox____').hide();

                $(".modal-header #title_modal").text("แก้ไขข้อมูลส่วนตัว");
                $(".modal-footer #submit").text("บันทึกข้อมูล");
                $(".modal-body #url_route").val("dashboard/user/edit/" + <?= $data_user[0]['id_user'] ?> + "/1");
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
                    if (response.success) {
                        Swal.fire({
                            title: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            allowOutsideClick: true
                        });
                        setTimeout(() => {
                            if (response.reload) {
                                window.location.reload();
                            }
                        }, 2000);
                    } else {
                        if (response.validator) {
                            var mes = "";
                            if (response.validator.email_user == "The email_user field must contain a valid email address.") {
                                mes += 'ช่องอีเมลจะต้องมีที่อยู่อีเมลที่ถูกต้อง.' + '<br><hr/>'
                            }
                            if (response.validator.email_user == "The email_user field must contain a unique value.") {
                                mes += 'อีเมลนี้ถูกสมัครสมาชิกแล้ว' + '<br><hr/>'
                            }
                            if (response.validator.name_user) {
                                mes += 'ชื่อต้องมีอย่างน้อย 2 ตัว.' + '<br><hr/>';
                            }
                            if (response.validator.lastname_user) {
                                mes += 'นามสกุลต้องมีอย่างน้อย 2 ตัว.' + '<br><hr/>';
                            }
                            if (response.validator.phone === "The phone field must contain only numbers.") {
                                mes += 'เบอร์ติดต่อต้องมีเฉพาะตัวเลขเท่านั้น.' + '<br>';
                            }
                            if (response.validator.phone === "The phone field must be at least 10 characters in length.") {
                                mes += 'เบอร์ติดต่อต้องมี 10 หลัก.' + '<br>';
                            }
                            if (response.validator.phone === "The phone field cannot exceed 10 characters in length.") {
                                mes += 'เบอร์ติดต่อต้องมีไม่เกิน 10 หลัก.' + '<br>';
                            }
                            Swal.fire({
                                title: mes,
                                icon: 'error',
                                showConfirmButton: true,
                                width: '55%',
                                confirmButtonText: 'ตกลง',
                            });
                        } else {
                            Swal.fire({
                                title: response.message,
                                icon: 'error',
                                confirmButtonText: 'ตกลง',
                                showConfirmButton: true
                            });
                        }
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