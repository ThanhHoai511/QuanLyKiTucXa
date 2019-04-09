<li class="active treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>
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
        <li><a href="{{ route('danhSachTinTuc') }}"><i class="fa fa-circle-o"></i> Danh sách tin tức</a></li>
        <li><a href="{{ route('themTinTuc') }}"><i class="fa fa-circle-o"></i> Thêm tin tức</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>Forms</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
        <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
        <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-table"></i> <span>Tables</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
        <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
    </ul>
</li>
<li>
    <a href="pages/calendar.html">
        <i class="fa fa-calendar"></i> <span>Calendar</span>
        <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
    </a>
</li>
<li>
    <a href="pages/mailbox/mailbox.html">
        <i class="fa fa-envelope"></i> <span>Mailbox</span>
        <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-folder"></i> <span>Examples</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
        <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
        <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
        <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
        <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
        <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
        <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
        <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
        <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-share"></i> <span>Multilevel</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
    </ul>
</li>
