$(document).ready(function () {
    $("#form").submit(function () {
        if ($('#tien_cong').val() == '') {
            $('#errTienCong').text("Bạn phải nhập tiền công!");
            return false;
        }
    });

    $("#tien_cong").keyup(function () {
        if ($('#tien_cong').val() != '') {
            $('#errTienCong').text("");
        } else {
            $('#errTienCong').text("Bạn phải nhập tiền công!");
        }
    });
});
