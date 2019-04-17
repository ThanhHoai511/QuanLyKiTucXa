$(document).ready(function () {
    $("#form").submit(function () {
        if ($('#ten').val() == '') {
            $('#errorTen').text("Bạn phải nhập tên!");
            return false;
        }
        if ($('#gia').val() == '') {
            $('#errGia').text("Bạn phải nhập giá!");
            return false;
        }
    });

    $("#ten").keyup(function () {
        if ($('#ten').val() != '') {
            $('#errorTen').text("");
        } else {
            $('#errorTen').text("Bạn phải nhập tên!");
        }
    });
    $("#gia").keyup(function () {
        if ($('#gia').val() != '') {
            $('#errGia').text("");
        } else {
            $('#errGia').text("Bạn phải nhập giá!");
        }
    });
});
