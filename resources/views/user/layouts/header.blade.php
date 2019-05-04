<header>
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-12 logo-left no-padding">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('backend/dist/img/logo-utc.png') }}" alt="" style="width:50%;">
                    </a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 logo-right no-padding">
                    <h1>Ký túc xá</h1>
                    <h1>Trường Đại học Giao thông vận tải</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #04091e">
        <div class="container main-menu" id="main-menu" style="padding-left: 50px;">
            <div class="row align-items-center justify-content-between container">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Bộ máy quản lý</a></li>
                        <li><a href="{{ route('don-dang-ky') }}">Đăng ký nội trú</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
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
    </div>
</header>
