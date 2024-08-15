@extends('Interface.layouts.layout')
@section('content')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="first-slot">
                <div class="masonry-box post-media" width="788px" height="433px">
                    <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="/category/chinh-tri" title="">Thời Sự</a></span>
                                <h4><a href="news/dong-chi-to-lam-duoc-bau-giu-chuc-tong-bi-thu-ban-chap-hanh-trung-uong-dang-cong-san-viet-nam" title="">Chủ tịch nước Tô Lâm nhận chức Tổng bí thư Đảng Cộng sản Việt Nam</a></h4>
                                <small><a href="tech-single.html" title="">24 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->

            <div class="second-slot">
                <div class="masonry-box post-media">
                    <img src="upload/bxj7l197.png" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="/category/chinh-tri" title="">Chính Trị</a></span>
                                <h4><a href="news/vu-am-sat-ong-donald-trump-loi-canh-bao-ve-su-chia-re-va-nguy-co-bao-luc-chinh-tri-o-my" title="">Ông Donald Trump bị bắn trong sự kiện tranh cử</a></h4>
                                <small><a href="tech-single.html" title="">03 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->

            <div class="last-slot">
                <div class="masonry-box post-media">
                    <img src="upload/vw5h6tpr.png" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="/category/thoi-tiet" title="">Thời Tiết</a></span>
                                <h4><a href="news/mien-bac-mua-lon-keo-dai-toi-ngay-2-8" title="">Thời tiết miền Bắc đổ mưa, nhiều tuyến phố ngập lớn</a></h4>
                                <small><a href="tech-single.html" title="">01 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->
        </div><!-- end masonry -->
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">TIN MỚI NHẤT<a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">

                        @foreach ($tintuc as $tt )  
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="news/{{$tt->TieuDeKhongDau}}" title="">
                                        <img src="images/{{$tt->Hinh}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4 style="background-color: #fff;"><a href="news/{{$tt->TieuDeKhongDau}}" title="" style="text-transform: uppercase;">{{$tt->TieuDe}}</a></h4>
                                <p>{{$tt->TomTat}}</p>
                                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">{{$tt->LoaiTin->TheLoai->Ten}}</a></small>
                                <small><a href="tech-single.html" title="">{{ $tt->created_at->format('d-m-Y') }}</a></small>

                                <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> {{$tt->SoLuotXem}}</a></small>
                            </div><!-- end meta -->
                        </div>
                        <hr class="invis">
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            {{$tintuc->links()}}
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="https://photo-cms-kienthuc.epicdn.me/w730/Uploaded/2022/afsgy/2022_12_07/trinh-ba-quat-ha-noi-864.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title" style="color: #009EE5;">THỂ LOẠI</h2>
                        <ul>
                            @foreach($theloai as $tl)
                            <li class="list-group-item"><a style="font-size: 20px;" href="category/{{$tl->TenKhongDau}}">{{$tl->Ten}}</a></li>
                            @endforeach
                        </ul>

                        <!-- </div>end blog-box -->
                        <hr class="invis">
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title" style="color: #009EE5;">TIN HOT</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach ($tinhot as $th)
                                <a href="news/{{$th->TieuDeKhongDau}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="images/{{$th->Hinh}}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{$th->TieuDe}}</h5>
                                        <small>{{ $th->created_at->format('d-m-Y') }}</small>
                                    </div>
                                </a>
                                @endforeach



                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title" style="color: #009EE5;">ĐÁNH GIÁ GẦN ĐÂY</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/tech_blog_02.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Rất trực quan và dễ theo dõi, không bị bỏ lở</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>

                                <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/tech_blog_03.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Hữu ích và rất chính xác, không thiên vị</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>

                                <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="upload/tech_blog_07.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Tại sao tôi không biết đến trang báo này sớm hớn</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Follow Us</h2>

                        <div class="row text-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button facebook-button">
                                    <i class="fa fa-facebook"></i>
                                    <p>27k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button twitter-button">
                                    <i class="fa fa-twitter"></i>
                                    <p>98k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button google-button">
                                    <i class="fa fa-google-plus"></i>
                                    <p>17k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                    <p>22k</p>
                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->

                    <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection