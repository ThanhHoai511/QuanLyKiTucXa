$(document).ready(function () {
    $("#form").submit(function () {
        if ($('#ten').val() == '') {
            $('#errorTen').text("Bạn phải nhập tên khu nhà!");
            return false;
        }
    });

    $("#ten").keyup(function () {
        if ($('#ten').val() != '') {
            $('#errorTen').text("");
        } else {
            $('#errorTen').text("Bạn phải nhập tên loại phòng!");
        }
    });
});
