$(document).ready(function() {
    $('#gia').keyup(function() {
        var gia = $("#gia");
        gia.val(gia.val().replace(/,/g, '').replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
    });
    $('#tien_cong').keyup(function() {
        var gia = $("#tien_cong");
        gia.val(gia.val().replace(/,/g, '').replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
    });
});
