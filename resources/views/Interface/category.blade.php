@extends('Interface.layouts.layout')
@section('content')

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-star bg-orange"></i> Thể Loại Tin<small class="hidden-xs-down hidden-sm-down">Mọi thể loại xung quanh đời sống Việt Nam </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Thể Loại</a></li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- e!-- end page-title -->

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <h1 style="float: left;font-size: 50px; color: red;">{{$tentheloai->Ten}}</h1>
                    <form class="d-flex justify-content-end align-items-center" method="POST" action="/postcategory">
                        <div class="form-group mb-2 flex-grow-1"><input type="hidden" name="_token" value="{{csrf_token()}}">
                            <select class="form-select" name="theloai_id" aria-label="Default select example" style='padding: 11px 24px;margin-right:15px ;'>

                                <option selected value="0">Chọn Thể Loại</option>
                                @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 me-2">Tìm</button>
                    </form>
                    <!-- <h1 style="font-size: 50px; color: red;">{{$tentheloai->Ten}}</h1> -->
                    <div class="blog-list clearfix">
                        @foreach ($tentheloai->LoaiTin as $loaitin)
                        @foreach ( $loaitin->TinTuc as $tt )
                        <hr class="invis">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="news/{{$tt->id}}" title="">
                                        <img src="{{asset('images/'.$tt->Hinh)}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->


                            <div class="blog-meta big-meta col-md-8">
                                <h4 style="background-color: rgb(247, 247, 247);"><a href="news/{{$tt->id}}" title="" style="text-transform: uppercase;">{{$tt->TieuDe}}</a></h4>
                                <p>{{$tt->TomTat}}</p>
                                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">{{$loaitin->Ten}}</a></small>
                                <small><a href="tech-single.html" title="">{{ $tt->created_at->format('d-m-Y') }}</a></small>

                                <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> {{$tt->SoLuotXem}}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                        @endforeach
                        @endforeach
                    </div>
                </div><!-- end blog-list -->

                <hr class="invis">

                <div class="row">
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
                                <img src="https://photo-cms-kienthuc.epicdn.me/w730/Uploaded/2022/afsgy/2022_12_07/trinh-ba-quat-ha-noi-864.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->



                    <div class="widget">
                        <h2 class="widget-title" style="color: #009EE5;">TIN HOT</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach ($tinhot as $th)
                                <a href="news/{{$th->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('images/'.$th->Hinh)}}" alt="" class="img-fluid float-left">
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