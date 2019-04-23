<li class="treeview">
    <a href="#">
        <i class="fa fa-files-o"></i>
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
        <i class="fa fa-laptop"></i>
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
        <li><a href="{{ route('themPhongExcel') }}"><i class="fa fa-circle-o"></i> Thêm phòng từ file excel</a></li>
    </ul>
</li>
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
        <i class="fa fa-calendar"></i> <span>Cơ sở vật chất</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('danhSachCSVC') }}"><i class="fa fa-circle-o"></i> Danh sách cơ sở vật chất</a></li>
        <li><a href="{{ route('themCSVC') }}"><i class="fa fa-circle-o"></i> Thêm cơ sở vật chất</a></li>
        <li><a href="{{ route('themCSVCExcel') }}"><i class="fa fa-circle-o"></i> Thêm cơ sở vật chất từ file excel</a></li>
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
        <li><a href="{{ route('themExcel') }}"><i class="fa fa-circle-o"></i> Thêm tài khoản từ file </a></li>
    </ul>
</li>
{{--<li>--}}
{{--    <a href="pages/calendar.html">--}}
{{--        <i class="fa fa-calendar"></i> <span>Calendar</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <small class="label pull-right bg-red">3</small>--}}
{{--              <small class="label pull-right bg-blue">17</small>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a href="pages/mailbox/mailbox.html">--}}
{{--        <i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <small class="label pull-right bg-yellow">12</small>--}}
{{--              <small class="label pull-right bg-green">16</small>--}}
{{--              <small class="label pull-right bg-red">5</small>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--</li>--}}

{{--<li class="treeview">--}}
{{--    <a href="#">--}}
{{--        <i class="fa fa-share"></i> <span>Multilevel</span>--}}
{{--        <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--    </a>--}}
{{--    <ul class="treeview-menu">--}}
{{--        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
{{--        <li class="treeview">--}}
{{--            <a href="#"><i class="fa fa-circle-o"></i> Level One--}}
{{--                <span class="pull-right-container">--}}
{{--                  <i class="fa fa-angle-left pull-right"></i>--}}
{{--                </span>--}}
{{--            </a>--}}
{{--            <ul class="treeview-menu">--}}
{{--                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
{{--                <li class="treeview">--}}
{{--                    <a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
{{--                        <span class="pull-right-container">--}}
{{--                      <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                    </a>--}}
{{--                    <ul class="treeview-menu">--}}
{{--                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
{{--    </ul>--}}
{{--</li>--}}
