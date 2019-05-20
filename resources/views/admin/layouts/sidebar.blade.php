<p style="color: white">---------- Quản lý tài khoản ------------------</p>
@if(Auth::user()->role_id == 2)
<li class="treeview">
    <a href="#">
        <i class="fa fa-adjust"></i>
        <span>Chức vụ</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachChucVu') }}"><i class="fa fa-circle-o"></i>Danh sách các chức vụ</a></li>
        <li><a href="{{ route('themChucVu') }}"><i class="fa fa-circle-o"></i>Thêm chức vụ</a></li>
    </ul>
</li>
@endif
<li class="treeview">
    <a href="#">
        <i class="fa fa-adn"></i>
        <span>Quyền</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachQuyen') }}"><i class="fa fa-circle-o"></i>Danh sách các quyền</a></li>
        <li><a href="{{ route('themQuyen') }}"><i class="fa fa-circle-o"></i>Thêm quyền</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-adn"></i>
        <span>Quyền theo Chức vụ</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachQuyenChucVu') }}"><i class="fa fa-circle-o"></i>Danh sách các quyền theo chức vụ</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-folder"></i> <span>Nhân Viên</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachNhanVien') }}"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
        <li><a href="{{ route('themNhanVien') }}"><i class="fa fa-circle-o"></i> Thêm nhân viên</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-share"></i> <span>Tài khoản</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachTaiKhoan') }}"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a></li>
    </ul>
</li>
<p style="color:white;">---------- Quản lý cơ sở vật chất-----------------</p>
<li class="treeview">
    <a href="#">
        <i class="fa fa-home"></i>
        <span>Khu nhà</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachKhuNha') }}"><i class="fa fa-circle-o"></i>Danh sách khu nhà</a></li>
        <li><a href="{{ route('themKhuNha') }}"><i class="fa fa-circle-o"></i>Thêm khu nhà</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Loại phòng</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachLoaiPhong') }}"><i class="fa fa-circle-o"></i> Danh sách loại phòng</a></li>
        <li><a href="{{ route('themLoaiPhong') }}"><i class="fa fa-circle-o"></i> Thêm loại phòng</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-calendar"></i> <span>Cơ sở vật chất</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachCSVC') }}"><i class="fa fa-circle-o"></i> Danh sách cơ sở vật chất</a></li>
        <li><a href="{{ route('themCSVC') }}"><i class="fa fa-circle-o"></i> Thêm cơ sở vật chất</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>Phòng</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachPhong') }}"><i class="fa fa-circle-o"></i>Danh sách phòng</a></li>
        <li><a href="{{ route('themPhong') }}"><i class="fa fa-circle-o"></i> Thêm phòng</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-ambulance"></i> <span>Phản hồi</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachPhanHoi') }}"><i class="fa fa-circle-o"></i>Danh sách phản hồi</a></li>
    </ul>
</li>
<p style="color:white;">---------- Quản lý tin tức-------------------------</p>
<li class="treeview">
    <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span>Tin tức</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachTinTuc') }}"><i class="fa fa-circle-o"></i>Danh sách tin tức</a></li>
        <li><a href="{{ route('themTinTuc') }}"><i class="fa fa-circle-o"></i>Thêm tin tức</a></li>
    </ul>
</li>

<p style="color: white">---------- Quản lý hóa đơn ---------------------</p>
<li class="treeview">
    <a href="#">
        <i class="fa fa-table"></i> <span>Dịch vụ</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachDichVu') }}"><i class="fa fa-circle-o"></i> Danh sách dịch vụ</a></li>
        <li><a href="{{ route('themDichVu') }}"><i class="fa fa-circle-o"></i> Thêm dịch vụ</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-book"></i> <span>Hóa đơn dịch vụ</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachHDDV') }}"><i class="fa fa-circle-o"></i> Danh sách hóa đơn dịch vụ</a></li>
        <li><a href="{{ route('themHDDV') }}"><i class="fa fa-circle-o"></i> Thêm hóa đơn dịch vụ</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>Hóa đơn phòng</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachHDP') }}"><i class="fa fa-circle-o"></i> Danh sách hóa đơn phòng</a></li>
    </ul>
</li>
<p style="color: white">---------- Quản lý hợp đồng ------------------</p>
<li class="treeview">
    <a href="#">
        <i class="fa fa-user"></i> <span>Sinh viên</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachSinhVien') }}"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
        <li><a href="{{ route('themExcel') }}"><i class="fa fa-circle-o"></i> Thêm sinh viên từ file </a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-address-card"></i> <span>Đơn đăng ký</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachDonDangKy') }}"><i class="fa fa-circle-o"></i> Danh sách đơn đăng ký</a></li>
    </ul>
</li>
{{--@can('managing_agreement', Auth::user())--}}
<li class="treeview">
    <a href="#">
        <i class="fa fa-amazon"></i> <span>Hợp đồng</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachHopDong') }}"><i class="fa fa-circle-o"></i> Danh sách hợp đồng</a></li>
    </ul>
</li>
{{--@endcan--}}

<li class="treeview">
    <a href="#">
        <i class="fa fa-youtube-play"></i> <span>Đơn xin chấm dứt hợp đồng</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachDonXinHuy') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
    </ul>
</li>

