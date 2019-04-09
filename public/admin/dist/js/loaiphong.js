$(document).ready(function () {
    $("#form").submit(function () {
        if ($('#ten').val() == '') {
            $('#errorTen').text("Bạn phải nhập tên loại phòng!");
            return false;
        }

        if ($('#gia_phong').val() == '') {
            $('#errorGiaPhong').text("Bạn phải nhập giá phòng!");
            return false;
        }

        if ($('#tien_cuoc_tai_san').val() == '') {
            $('#errorTc').text("Bạn phải nhập tiền cược tài sản!");
            return false;
        }

        if ($('#so_luong_sv_toi_da').val() == '') {
            $('#errorSLSV').text("Bạn phải nhập số lượng sinh viên tối đa!");
            return false;
        }

        if ($('#dien_tich').val() == '') {
            $('#errorDienTich').text("Bạn phải nhập diện tích phòng!");
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

    $("#gia_phong").keyup(function () {
        var giaPhong = $("#gia_phong");
        giaPhong.val(giaPhong.val().replace(/,/g, '').replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
        if ($('#gia_phong').val() != '') {
            $('#errorGiaPhong').text("");
        } else {
            $('#errorGiaPhong').text("Bạn phải nhập giá phòng!");
        }
    });

    $("#tien_cuoc_tai_san").keyup(function () {
        var tienCuoc = $("#tien_cuoc_tai_san");
        tienCuoc.val(tienCuoc.val().replace(/,/g, '').replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
        if ($('#tien_cuoc_tai_san').val() != '') {
            $('#errorTc').text("");
        } else {
            $('#errorTc').text("Bạn phải tiền cược tài sản!");
        }
    });

    $("#so_luong_sv_toi_da").keyup(function () {
        if ($('#so_luong_sv_toi_da').val() != '') {
            $('#errorSLSV').text("");
        } else {
            $('#errorSLSV').text("Bạn phải số lượng sinh viên ở tối đa!");
        }
    });

    $("#dien_tich").keyup(function () {
        if ($('#dien_tich').val() != '') {
            $('#errorDienTich').text("");
        } else {
            $('#errorDienTich').text("Bạn phải diện tích phòng!");
        }
    });
});
