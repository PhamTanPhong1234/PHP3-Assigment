<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>ViEnTech - Flash Tech News </title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Design fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('css/style.css')}}" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="{{asset('css/responsive.css')}}" rel="stylesheet">

<!-- Colors for this template -->
<link href="{{asset('css/colors.css')}}" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="{{asset('css/version/tech.css')}}" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .user-info-dropdown-XYZ {
        display: none;
        position: absolute;
        top: 90%;
        right: 0px;
        /* Đặt ngay dưới thẻ cha */
        background-color: white;
        width: 170px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .nav-item:hover .user-info-dropdown-XYZ {
        display: block;
    }

    
    .user-info-dropdown-XYZ a {
        margin: 0;
        padding: 10px 0;
        color: black;
        text-decoration: none;
        transition: 0.2s;
    }

    .user-info-dropdown-XYZ a:hover {
        text-decoration: underline;
        color:#00A6E5 ;
    }
</style>
<style>
    html {
        font-family: "Afacad", sans-serif;
    }
</style>
</head>

<body>
    <div class="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="{{ asset('images/version/tech-logo.png') }}" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/" style="font-size: 20px;">Trang Chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/news" style="font-size: 20px;">Thể Loại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/video" style="font-size: 20px;">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact-us" style="font-size: 20px;">Liên Hệ</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="font-size: 20px;"><i class="fa fa-search"></i></a>
                            </li>
                            @if (isset($nd) && $nd->level == 0)

                            <!-- <h5>lỗi</h5> -->
                            <li class="nav-item" style="position: relative;">
                                <h5 style="background-color: white; padding: 5px 10px; border-radius: 5px; color: black;">
                                    {{$nd->name}} &nbsp 
                                    <img src="{{asset('images/'. $nd->Hinh)}}" class="avatar rounded-circle border-cyan" width="30px" alt="">
                                    <i class="fa-solid fa-caret-down"></i>
                                </h5>
                                <div class="user-info-dropdown-XYZ">
                                    <a href="#"><i class="fa-solid fa-user"></i>  Thông tin tài khoản</a> <br>
                                    <a href="/dang-xuat"><i class="fa-solid fa-right-from-bracket"></i>  Đăng xuất</a>
                                </div>
                            </li>
                            @elseif (isset($nd) && $nd->level == 1)
                            <li class="nav-item" style="position: relative;">
                                <h5 style="background-color: white; padding: 5px 10px; border-radius: 5px; color: black;">
                                    {{$nd->name}}  &nbsp
                                    <img src="{{asset('images/'. $nd->Hinh)}}" class="avatar rounded-circle border-cyan" width="30px" alt="">
                                    <i class="fa-solid fa-caret-down"></i>
                                </h5>
                                <div class="user-info-dropdown-XYZ">
                                    <a href="#"><i class="fa-solid fa-user"></i>  Thông tin tài khoản</a> <br>
                                    <a href="/Admin/dashboard"><i class="fa-solid fa-gear"></i>  Quản Lý Admin</a> <br>
                                    <a href="/dang-xuat"><i class="fa-solid fa-right-from-bracket"></i>  Đăng xuất</a>
                                </div>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}" style="font-size: 20px;"><i class="fa fa-user"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header>
        <!-- end market-header -->

        @yield('content')

        <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="widget">
                    <div class="footer-text text-left">
                        <a href="index.html"><img src="images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                        <p>Tech Blog là một blog công nghệ, chúng tôi chia sẻ các bài viết về marketing, tin tức và thiết bị.</p>
                        <div class="social">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-left">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ email của bạn">
                                <button type="submit" class="btn btn-primary">GỬI</button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Danh Mục Phổ Biến</h2>
                    <div class="link-widget">
                        <ul>
                            <li><a href="#">Marketing <span>(21)</span></a></li>
                            <li><a href="#">Dịch Vụ SEO <span>(15)</span></a></li>
                            <li><a href="#">Công Ty Số <span>(31)</span></a></li>
                            <li><a href="#">Kiếm Tiền <span>(22)</span></a></li>
                            <li><a href="#">Blogging <span>(66)</span></a></li>
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Bản Quyền</h2>
                    <div class="link-widget">
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Quảng cáo</a></li>
                            <li><a href="#">Viết cho chúng tôi</a></li>
                            <li><a href="#">Thương hiệu</a></li>
                            <li><a href="#">Giấy phép & Trợ giúp</a></li>
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
            </div>
        </div>
    </div><!-- end container -->
</footer>

    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

</body>