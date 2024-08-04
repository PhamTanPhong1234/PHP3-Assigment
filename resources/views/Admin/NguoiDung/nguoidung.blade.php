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
        <form id="addUserForm" action="them-nguoi-dung" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên">
            </div>
            <div class="form-group">
                <label for="image">Ảnh đại diện</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu ( Độ dài 8 kí tự )</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group">
                <label>Quyền hạn truy cập</label><br>
                <label class="radio-inline"><input name="level" type="radio" value="1" checked="">Admin</label>
                <label class="radio-inline"><input name="level" type="radio" value="0" checked="">Người Dùng</label>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>

    <!-- Right side: User list -->
    <div class="col-md-6">
        <h3>Danh sách người dùng</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Ảnh Đại Diện</th>
                    <th>Quyền Truy Cập</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="userList">
                @php
                $count = 1;
                @endphp
                @foreach ($nguoidung as $user )
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        <p>{{$user->email}}</p>
                    </td>
                    <td><img src="{{ asset('images/' . $user->Hinh) }}" alt="Hình ảnh" style="width: 100px; height: auto;"></td>

                    <td>
                        @if ($user->level == 1)
                        {{'Admin'}}
                        @else
                        {{'Người Dùng'}}
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm"><a href="{{url('Admin/nguoidung/sua-nguoi-dung/' . $user->id)}}">Sửa</a></button>
                        <button class="btn btn-danger btn-sm"><a href="{{url('Admin/nguoidung/xoa-nguoi-dung/' . $user->id)}}">Xóa</a></button>
                    </td>
                </tr>
                @php
                $count++;
                @endphp
                @endforeach
                <!-- Sample data -->

                <!-- Add more user rows here dynamically -->
            </tbody>
        </table>
        {{$nguoidung->links()}}
    </div>
</div>
@endsection