@extends("Admin.layouts.layouts")
@section('content')
<div class="row p-3">
    <!-- Left side: Add new user form -->
    <div class="col-md-6">
        <h3>Thêm người dùng mới</h3>
        <form id="addUserForm">
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
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
                    <th>Mật khẩu</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="userList">
                <!-- Sample data -->
                <tr>
                    <td>1</td>
                    <td>Nguyen Van A</td>
                    <td>a@example.com</td>
                    <td>password123</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Sửa</button>
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </td>
                </tr>
                <!-- Add more user rows here dynamically -->
            </tbody>
        </table>
    </div>
</div>
@endsection