<p>TRƯỜNG ĐẠI HỌC GIAO THÔNG VẬN TẢI</p>
<p>PHÒNG TÀI CHÍNH - KẾ TOÁN</p>
<h2>BIÊN LAI THU TIỀN ĐIỆN NƯỚC</h2>
<p>Ngày {{ date('d-m-Y', strtotime(now())) }}</p>
<p>Phòng: {{ $hd[0]->phong->ten }}</p>
<p>Khu nhà: {{ $hd[0]->phong->khunha->ten}}</p>
<p>Nộp tiền điện nước từ ngày {!! date('d-m-Y', strtotime($hd[0]->ngay_bat_dau)) !!} đến ngày {!! date('d-m-Y', strtotime($hd[0]->ngay_ket_thuc)) !!}.</p>
<table>
    <thead>
        <tr>
            <th>Nội dung</th>
            <th>Chỉ số mới</th>
            <th>Chỉ số cũ</th>
            <th>Số tiêu thụ thực tế</th>
            <th>Số tiêu thụ cho phép</th>
            <th>Số vượt định mức</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
    @php $tongTien = 0; @endphp
        @foreach($hd as $hd)
            <tr>
                <td>
                    @if($hd->ma_dich_vu == 1)
                        Điện
                    @elseif($hd->ma_dich_vu == 2)
                        Nước
                    @endif
                </td>
                <td>
                    {!! $hd->chi_so_cuoi !!}
                </td>
                <td>
                    {!! $hd->chi_so_dau !!}
                </td>
                @php $soTT = $hd->chi_so_cuoi - $hd->chi_so_dau; @endphp
                <td>
                    {!! $soTT !!}
                </td>
                <td>{!! $hd->so_tieu_thu_cho_phep !!}</td>
                @php $soVuotMuc = $soTT - $hd->so_tieu_thu_cho_phep * $hd->phong->so_luong_sv_hien_tai; @endphp
                <td>
                    {!! $soVuotMuc !!}
                </td>
                <td>{!! $hd->gia !!}</td>
                <td>{!! $hd->tong_tien !!}</td>
                @php $tongTien += $hd->tong_tien; @endphp
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7">Tổng tiền</td>
            <td>{!! $tongTien !!}</td>
        </tr>
    </tfoot>
</table>
<p>Người nộp</p>
<p>Người thu tiền</p>
<p>Đơn vị quản lý</p>