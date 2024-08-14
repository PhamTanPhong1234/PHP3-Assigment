@extends('Interface.layouts.layout')
@section('content')
<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="#">{{$tintuc->Ten}}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{$tintuc->LoaiTin->Ten}}</a></li>
                            <li class="breadcrumb-item active">{{$tintuc->Ten}}</li>
                        </ol>

                        <span class="color-orange"><a href="tech-category-01.html" title="">{{$tintuc->LoaiTin->Ten}}</a></span>

                        <h3>{{$tintuc->TieuDe}}</h3>

                        <div class="blog-meta big-meta">
                            <small><a href="tech-single.html" title="">{{ $tintuc->created_at->format('d-m-Y') }}</a></small>
                            <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $tintuc->SoLuotXem }}</a></small>
                        </div><!-- end meta -->

                        <div style="text-align: justify; /* Căn chỉnh văn bản đều */
    text-justify: inter-word; font-size: 25px; font-weight: bold; padding: 20px 0;">{{$tintuc->TomTat}}.</div>
                        <div style="text-align: justify; /* Căn chỉnh văn bản đều */
    text-justify: inter-word; font-size: 20px;">{!!$tintuc->NoiDung!!}</div>
                        <br>
                        <hr>
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->



                    </div><!-- end row -->
                </div><!-- end container -->
</section>

@endsection