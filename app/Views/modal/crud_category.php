<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="overlay preloader">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div>
        <div class="modal-header bg-info">
            <h4 class="modal-title" id="title_modal" name="title_modal"></h4>
        </div>
        <div class="modal-body">
            <form class="mb-3" id="form_user" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                <div class="row" id="customSwitch_status">
                    <div class="col-sm-12">
                        <div class="form-group" id="customSwitch">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                    name="customSwitch3" onclick="change_status()">
                                <label class="custom-control-label" for="customSwitch3" id="LabelcustomSwitch3"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ชื่อผู้หมวดหมู่</label>
                            <input type="text" class="form-control" placeholder="กรอกชื่อหมวดหมู่" id="category_name"
                                name="category_name" required>
                        </div>
                    </div>
                </div>
                <input type="text" id="url_route" name="url_route" hidden>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="Submit" id="submit"></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>

<script>
    $(document).ready(function () {
        $(".overlay").hide();
    });

    $("#form_user").on('submit', function (e) {
        e.preventDefault();
        const urlRouteInput = document.getElementById("url_route");
        // action_(urlRouteInput.value, 'form_user');
    });
</script>
<script>
    $("#exampleCheck1").on('click', function () {
        if ($(this).is(':checked')) {
            $("#password").prop("disabled", false);
            $('#submit').prop('disabled', true);
            $('#showPasswordCheckbox____').show();
        } else {
            $("#password").prop("disabled", true);
            $('#submit').prop('disabled', false);
            $("#password").val("");
            $('#showPasswordCheckbox____').hide();
            removeAlert();
        }
    })
</script>
<script>
    function change_status() {
        const isChecked = document.getElementById("customSwitch3").checked;
        if (isChecked) {
            $(".modal-body #LabelcustomSwitch3").text("เปิดใช้งาน");
        } else {
            $(".modal-body #LabelcustomSwitch3").text("ปิดใช้งาน");
        }
    }
</script>