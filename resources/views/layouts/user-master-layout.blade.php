<?php 
// use App\Models\Blog;
// $blog = Blog::all();
?>
{{-- Master layout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sạch Foods')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <!-- Font -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="{{asset('frontend/fonts/themify-icons/themify-icons.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/fonts/linearicons/style.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/fonts/linea/styles.css')}}">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('./homepage/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('./homepage/css/style.css')}}" type="text/css"> --}}
</head>

<body>
    <!-- Page Preloder -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('home') }}"> <h3><b><strong style="color: rgb(0, 145, 255)">Sạch foods</strong></b></h3></a>
        </div>
        @auth
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{ route('home.mycart') }}"><i class="fa fa-cart-plus"></i> <span>0</span></a></li>
                <li><a href="{{ route('home.cartUser', [Auth::user()->id]) }}"><i class="fa fa-shopping-bag"></i> <span>Tien shopping</span></a></li>
            </ul>
            <div class="header__cart__price">Tổng tiền: <span> test tổng tiền VNĐ</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="{{ route('logout') }}"><i class="fa fa-user"></i> Đăng xuất</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="">Trang chủ</a></li>
                <li><a href="{{ route('home') }}">Sản Phẩm</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route('home') }}">Trái Cây</a></li>
                        <li><a href="./blog.html">Thịt Tươi</a></li>
                        <li><a href="./blog.html">Cá Tươi</a></li>
                        <li><a href="./blog.html">Đông Lạnh</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('home.cartUser', [Auth::user()->id]) }}">Suất ăn công nghiệp</a></li>
                <li><a href="{{ route('home.cartUser', [Auth::user()->id]) }}">Giỏ</a></li>
            </ul>
        </nav>
        @else
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{ route('home.register') }}"><i class="fa-cart-plus"></i> <span>0</span></a></li>
                <li><a href="{{ route('home.register') }}"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
            </ul>
            <div class="header__cart__price">Tổng tiền: <span>0 VNĐ</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="{{ route('home.login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
            </div>
        </div>
        
        
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('home') }}">Sản Phẩm</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route('home') }}">Trái Cây</a></li>
                        <li><a href="">Thịt Tươi</a></li>
                        <li><a href="">Hải Sản</a></li>
                        <li><a href="">Đông Lạnh</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('home.register') }}">Suất ăn công nghiệp</a></li>
                <li><a href="{{ route('home.register') }}">Giỏ</a></li>
            </ul>
        </nav>
        @endauth
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="{{ route('home') }}"><i class="fa fa-facebook"></i></a>
            <a href="{{ route('home') }}"><i class="fa fa-twitter"></i></a>
            <a href="{{ route('home') }}"><i class="fa fa-linkedin"></i></a>
            <a href="{{ route('home') }}"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hungboss091289@gmail.com</li>
                <li>Cảm ơn quý khách đã mua hàng của chúng tôi</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> 0913 411 308 | 088 93 39 395 | 34A - Trần Phú - Điện Biên - Ba Đình- Hà Nội</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="{{ route('home') }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ route('home') }}"><i class="fa fa-twitter"></i></a>
                                <a href="{{ route('home') }}"><i class="fa fa-linkedin"></i></a>
                                <a href="{{ route('home') }}"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            @auth
                            <div class="header__top__right__auth">
                                <a href="{{ route('logout') }}"> Đăng xuất</a>
                            </div>

                            @else  
                            <div class="header__top__right__auth">
                                <a href="{{ route('home.register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a>
                                <a href="{{ route('home.login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div>
                            @endauth
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        {{-- <a href="{{ route('home') }}"><img src="{{ asset('./homepage/img/logo4.png')}}" alt=""></a> --}}
                        <a href="{{ route('home') }}"></a><h3><b><strong style="color: rgb(0, 145, 255)">Sạch foods</strong></b></h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li><a href="{{ route('home') }}">Sản phẩm</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route('home') }}">Trái Cây</a></li>
                                    <li><a href="">Thịt</a></li>
                                    <li><a href="">Hải sản</a></li>
                                    <li><a href="">Đông Lạnh</a></li>
                                </ul>
                            </li>
                            @auth
                            <li><a href="{{ route('home.blogs') }}">Suất ăn</a></li>
                            <li><a href="{{ route('home') }}">Bài viết</a>
                                <ul class="header__menu__dropdown">
                                    {{-- @foreach ($blog as $item)
                                    <li><a href="{{ route('home.blog', ['idBlog'=>$item->id]) }}">{{$item->name}}</a></li>
                                    @endforeach --}}
                                </ul>
                            </li>
                            @else
                            <li><a href="{{ route('home.register') }}">Suất ăn </a></li>
                            <li><a href="{{ route('home') }}">Bài viết</a>
                                <ul class="header__menu__dropdown">
                                    {{-- @foreach ($blog as $item)
                                    <li><a href="{{ route('home.register') }}">{{$item->name}}</a></li>
                                    @endforeach --}}
                                </ul>
                            </li>
                           
                            @endauth
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    @auth
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('home.mycart') }}"><i class="fa fa-cart-plus"></i> <span>0</span></a></li>
                            <li><a href="{{ route('home.cartUser', [Auth::user()->id]) }}"><i class="fa fa-shopping-bag"></i> <span>tiền cart 345</span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng tiền: <span>tiền cart 234 VNĐ</span></div>
                    </div>
                    @else
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('home.register') }}"><i class="fa fa-cart-plus"></i> <span>0</span></a></li>
                            <li><a href="{{ route('home.register') }}"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng tiền: <span>0 VNĐ</span></div>
                    </div>
                    @endauth
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="">
                                <div class="hero__search__categories">
                                    Tìm theo tên sản phẩm
                                </div>
                                <input type="text" name="search" placeholder="Bạn cần mua gì?">
                                <button type="submit" class="site-btn">Tìm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0913 411 308</h5>
                                <h5>088 93 39 395</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ asset('./homepage/img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>Sạch Foods</span>
                            <h2>Thực phẩm sạch <br />100% tự nhiên</h2>
                            <p>Chất lượng đảm bảo nhận và giao hàng nhanh chóng chất lượng.</p>
                            <a href="{{ route('home') }}" class="primary-btn">Đặt hàng ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('content')
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('./homepage/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src=" {{ asset('./homepage/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('home') }}"> <h3><b><strong style="color: rgb(0, 145, 255)">Sạch foods</strong></b></h3></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: </li>
                            <li>Phone  : 0931 452 452 | 0941 681 681 | Admin: Bùi Toàn</li>
                            <li>Email  :buitoan2612@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="{{ route('home') }}">About Us</a></li>
                            <li><a href="{{ route('home') }}">About Our Shop</a></li>
                            <li><a href="{{ route('home') }}">Secure Shopping</a></li>
                            <li><a href="{{ route('home') }}">Delivery infomation</a></li>
                            <li><a href="{{ route('home') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('home') }}">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('home') }}">Who We Are</a></li>
                            <li><a href="{{ route('home') }}">Our Services</a></li>
                            <li><a href="{{ route('home') }}">Projects</a></li>
                            <li><a href="{{ route('home') }}">Contact</a></li>
                            <li><a href="{{ route('home') }}">Innovation</a></li>
                            <li><a href="{{ route('home') }}">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="{{ route('home') }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ route('home') }}"><i class="fa fa-instagram"></i></a>
                            <a href="{{ route('home') }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ route('home') }}"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('./homepage/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('./homepage//jquery.slicknav.js')}}"></script>
    <script src="{{ asset('./homepage//mixitup.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('./homepage/js/main.js')}}"></script>
    <script src="{{ asset('/viewAdmin/js/action.js')}}"></script> --}}
</body>

</html>