$(document).ready(function () {
    $("#form").submit(function () {
        if ($('#ten').val() == '') {
            $('#errorTen').text("Bạn phải nhập tên phòng!");
            return false;
        }
        if ($('#ma_khu').val() == '') {
            $('#errKhuNha').text("Bạn phải chọn khu nhà!");
            return false;
        }
        if ($('#ma_loai_phong').val() == '') {
            $('#errLoaiPhong').text("Bạn phải chọn loại phòng!");
            return false;
        }
    });

    $("#ten").keyup(function () {
        if ($('#ten').val() != '') {
            $('#errorTen').text("");
        } else {
            $('#errorTen').text("Bạn phải nhập tên phòng!");
        }
    });

    $('#ma_khu').change(function() {
        if ($('#ma_khu').val() != '') {
            $('#errKhuNha').text("");
        } else {
            $('#errKhuNha').text("Bạn phải chọn khu nhà!");
        }
    });

    $('#ma_loai_phong').change(function() {
        if ($('#ma_loai_phong').val() != '') {
            $('#errLoaiPhong').text("");
        } else {
            $('#errLoaiPhong').text("Bạn phải chọn loại phòng!");
        }
    });
});
