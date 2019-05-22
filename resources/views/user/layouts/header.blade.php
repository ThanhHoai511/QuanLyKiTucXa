<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">

                    @if(Auth::check() && Auth::user()->role_id == null)
                    <ul>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="user-image">
                                <span class="hidden-xs">{{ Auth()->user()->sinhvien->ho_ten }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <form action="">
                                            {{ csrf_field() }}
                                            <a href="{{ route('editPass') }}" class="btn btn-primary btn-flat">Đổi mật khẩu</a>
                                        </form>
                                    </div>
                                    <div class="pull-right">
                                        <a href="" class="btn btn-danger btn-flat" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Đăng xuất</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                        @else
                        <a href="{{ route('login') }}" style="color:white">Đăng nhập</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-12 logo-left no-padding">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('images/common/logo.jpg') }}" alt="" style="width:50%;">
                    </a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 logo-right no-padding">
                    <h1>Ký túc xá</h1>
                    <h1>Trường Đại học Giao thông vận tải</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #292056">
        <div class="main-menu" id="main-menu">
            <div class="row align-items-center justify-content-between container">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="{{ route('trang-chu') }}">Trang chủ</a></li>
                        <li><a href="{{ route('gioi-thieu') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('ban-quan-ly') }}">Ban quản lý</a></li>
                        <li><a href="{{ route('don-dang-ky') }}">Đăng ký nội trú</a></li>
                        @if(Auth::check() && Auth::user()->role_id == null)
                        <li><a href="{{ route('chi-tiet-hop-dong') }}">Chi tiết hợp đồng</a></li>
                        <li><a href="{{ route('phan-hoi') }}">Phản hồi</a></li>
                        @endif
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
                <div class="navbar-right">
                    <form class="Search">
                        <input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
                        <label for="Search-box" class="Search-box-label">
                            <span class="lnr lnr-magnifier"></span>
                        </label>
                        <span class="Search-close">
                        <span class="lnr lnr-cross"></span>
                    </span>
                    </form>
            </div>
        </div>
    </div>
</header>
