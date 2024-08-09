<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ViEnTech - Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="{{ asset('admin/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <!-- include libraries(jQuery, bootstrap) -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ViEnTech</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="" class="btn btn-danger square-btn-adjust">Quay Về Trang Người Dùng</a> </div>

        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="{{asset('admin/img/find_user.png')}}" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a href="{{url('Admin/dashboard')}}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url('Admin/nguoidung/xem-nguoi-dung')}}"><i class="fa fa-desktop fa-3x"></i> Quản Lý Người Dùng</a>
                    </li>
                    <li>
                        <a href="{{url('Admin/tintuc/xem-tin-tuc')}}"><i class="fa fa-table fa-3x"></i> Quản Lý Tin Tức</a>
                    </li>
                    <li>
                        <a href="{{url('Admin/tintuc/them-tin-tuc')}}"><i class="fa fa-table fa-3x"></i> Thêm Tin Tức</a>
                    </li>
                    <li>
                        <a href="{{url('Admin/danhmuc/the-loai')}}"><i class="fa fa-table fa-3x"></i> Quản Lý Thể Loại</a>
                    </li>
                    <li>
                        <a href="{{url('Admin/lienhe/danhsach')}}"><i class="fa fa-table fa-3x"></i> Danh Sách Liên Hệ</a>
                    </li>
                    <li>
                        <a href="{{url('Admin/danhmuc/loai-tin')}}"><i class="fa fa-table fa-3x"></i> Quản Lý Loai Tin</a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}"><i class="fa fa-edit fa-3x"></i>Log Out</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="page-inner">
                @yield('content')
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <script src="{{ asset('admin/js/jquery-1.10.2.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.metisMenu.js') }}"></script>

    <!-- MORRIS CHART SCRIPTS -->
    <script src="{{ asset('admin/js/morris/morris.js') }}"></script>
    <script src="{{ asset('admin/js/morris/raphael-2.1.0.min.js') }}"></script>

    <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/js/custom.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS (required for Summernote) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 100, // Đặt chiều cao của trình soạn thảo
            });
        });
        $(document).ready(function() {
            $('#summernote-content').summernote({
                height: 500, // Đặt chiều cao của trình soạn thảo
            });
        });
    </script>

</body>

</html>