$(document).ready(function () {
    $("#form").submit(function () {
        if ($('#khu_nha').val() == '') {
            $('#errKhuNha').text("Bạn phải chọn khu nhà!");
            return false;
        }
        if ($('#file_excel').val() == '') {
            $('#errFile').text("Bạn phải chọn file excel!");
            return false;
        }
    });

    $("#khu_nha").change(function () {
        if ($('#khu_nha').val() != '') {
            $('#errKhuNha').text("");
        } else {
            $('#errKhuNha').text("Bạn phải chọn khu nhà!");
        }
    });

    $("#file_excel").change(function () {
        if ($('#file_excel').val() != '') {
            $('#errFile').text("");
        } else {
            $('#errFile').text("Bạn phải chọn file excel!");
        }
    });
});
