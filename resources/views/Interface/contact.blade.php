@extends('Interface.layouts.layout')
@section('content')
<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-envelope-open-o bg-orange"></i>Liên Hệ Với Chúng Tôi <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ </a></li>
                    <li class="breadcrumb-item active">Liên Hệ</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4>Chúng tôi là ai</h4>
                            <p>Tech Blog là một nền tảng thông tin cung cấp các bài viết chất lượng về công nghệ, nhiếp ảnh và thời trang từ các nhà báo và phóng viên độc lập trên toàn thế giới. Chúng tôi tập trung vào việc mang đến nội dung hữu ích và cập nhật nhất cho độc giả của mình.</p>

                            <h4>Chúng tôi giúp gì?</h4>
                            <p>Chúng tôi cung cấp thông tin chi tiết và phân tích về các sự kiện và xu hướng hiện tại trong ngành công nghiệp công nghệ, nhiếp ảnh và thời trang. Các bài viết của chúng tôi giúp độc giả hiểu rõ hơn về những vấn đề quan trọng và quyết định đúng đắn dựa trên thông tin chính xác và đáng tin cậy.</p>

                            <h4>Câu hỏi trước đăng kí</h4>
                            <p>Trước khi bạn quyết định đăng ký hoặc mua các dịch vụ của chúng tôi, chúng tôi có sẵn đội ngũ hỗ trợ để giải đáp tất cả các câu hỏi liên quan đến các bài viết và nội dung mà chúng tôi cung cấp. Hãy liên hệ với chúng tôi nếu bạn cần thêm thông tin hoặc có bất kỳ thắc mắc nào về các dịch vụ của chúng tôi.</p>
                        </div>


                        <div class="col-lg-7">
                            <form class="form-wrapper" method="POST" action="/contact" style="margin-bottom:  10px;">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="text" class="form-control mb-3" name="ten" placeholder="Tên Của Bạn">
                                <input type="email" class="form-control mb-3" name="email" placeholder="Địa Chỉ Email">
                                <input type="text" class="form-control mb-3" name="sdt" placeholder="Số Điện Thoại">
                                <input type="text" class="form-control mb-3" name="dia_chi" placeholder="Địa chỉ Của Bạn">
                                <textarea class="form-control mb-3" name="loi_nhan" placeholder="Lời nhắn của bạn dành cho chúng tôi"></textarea>
                                <button type="submit" class="btn btn-primary">Gửi<i class="fa fa-envelope-open-o"></i></button>
                            </form>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err )
                                {{$err}} <br>
                                @endforeach
                            </div>
                            @endif
                            @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection