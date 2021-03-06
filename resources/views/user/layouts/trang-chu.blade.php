@extends('user.layouts.app')

@section('content')

    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row small-gutters">
                    <div class="col-lg-12 top-post-left">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset('images/common/utc2.jpg') }}" alt="" style="height:300px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">Tin mới nhất</h4>
                            @foreach($tinTuc as $tt)
                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            @if($tt->hinh_anh == null)
                                                <img class="img-fluid" src="{{ asset('images/common/utc2.jpg') }}" alt="">
                                            @else
                                                <img class="img-fluid" src="{{ asset('images/tintuc/' . $tt->hinh_anh) }}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-7 post-right">
                                        <a href="#">
                                            <h4>{!! $tt->tieu_de !!}</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{!! $tt->created_at !!}</a></li>
                                        </ul>
                                        <p class="excert">
                                            {!! $tt->noi_dung !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- End latest-post Area -->

                        <!-- Start popular-post Area -->
                        <div class="popular-post-wrap">
                            <h4 class="title">Popular Posts</h4>
                            <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset('user/img/f1.jpg') }}" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="#">Food Habit</a></li>
                                    </ul>
                                    <a href="image-post.html">
                                        <h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-20 medium-gutters">
                                <div class="col-lg-6 single-popular-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="{{ asset('user/img/f2.jpg') }}" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h4>A Discount Toner Cartridge Is
                                                Better Than Ever.</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
                                        </ul>
                                        <p class="excert">
                                            Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 single-popular-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="{{ asset('user/img/f3.jpg') }}" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h4>A Discount Toner Cartridge Is
                                                Better Than Ever.</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
                                        </ul>
                                        <p class="excert">
                                            Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End popular-post Area -->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebars-area">
                            <div class="single-sidebar-widget most-popular-widget">
                                <h6 class="title">Tin nổi bật</h6>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m1.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>Help Finding Information
                                                Online is so easy</h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m2.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>Compatible Inkjet Cartr
                                                world famous</h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m3.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>5 Tips For Offshore Soft
                                                Development </h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m4.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>5 Tips For Offshore Soft
                                                Development </h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-sidebar-widget most-popular-widget">
                                <h6 class="title">Tin nổi bật</h6>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m1.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>Help Finding Information
                                                Online is so easy</h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m2.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>Compatible Inkjet Cartr
                                                world famous</h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m3.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>5 Tips For Offshore Soft
                                                Development </h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset('user/img/m4.jpg') }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="image-post.html">
                                            <h6>5 Tips For Offshore Soft
                                                Development </h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>

@endsection
