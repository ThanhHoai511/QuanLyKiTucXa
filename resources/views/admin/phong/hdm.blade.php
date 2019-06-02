<p>TRƯỜNG ĐẠI HỌC GIAO THÔNG VẬN TẢI</p>
<p>PHÒNG TÀI CHÍNH - KẾ TOÁN</p>
<h2>BIÊN LAI THU TIỀN MẠNG
<p>Ngày {{ date('d-m-Y', strtotime(now())) }}</p>
<p>Phòng: {{ $hd[0]->phong->ten }}</p>
<p>Khu nhà: {{ $hd[0]->phong->khunha->ten}}</p>
<p>Nộp tiền mạng từ ngày {!! date('d-m-Y', strtotime($hd[0]->ngay_bat_dau)) !!} đến ngày {!! date('d-m-Y', strtotime($hd[0]->ngay_ket_thuc)) !!}.</p>
<p>Số tiền: @php $tienMang = $hd->gia * $hd->phong->so_luong_sv_hien_tai; @endphp {!! $tienMang !!}</p>
<p>Người nộp</p>
<p>Người thu tiền</p>
<p>Đơn vị quản lý</p>