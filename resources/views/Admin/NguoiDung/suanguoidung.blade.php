@extends("Admin.layouts.layouts")
@section('content')
<div class="row p-3">
    <!-- Left side: Add new user form -->
    <div class="col-md-6">
        <h3>Thêm người dùng mới</h3>
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
        <form id="addUserForm" action="{{$nguoidung->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="{{$nguoidung->name}}">
            </div>
            <div class="form-group">
                <label for="image">Ảnh đại diện</label>
                <p> <img src="{{ asset('images/' . $nguoidung->Hinh) }}" alt="Hình ảnh" style="width: 100px; height: auto;"></p>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" value="{{$nguoidung->phone}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{$nguoidung->email}}">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu ( Độ dài 8 kí tự )</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" value="{{$nguoidung->password}}">
            </div>
            <div class="form-group">
                <label>Quyền hạn truy cập</label><br>
                <div class="form-group">
                    <label>Nổi Bật</label>
                    <label class="radio-inline"><input name="level" type="radio" value="0" @if ($nguoidung->level == 0)
                        {{'checked'}}
                        @endif
                        >Người Dùng</label>
                    <label class="radio-inline"><input name="level" type="radio" value="1" @if ($nguoidung->level == 1)
                        {{'checked'}}
                        @endif
                        >Admin</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>
@endsection