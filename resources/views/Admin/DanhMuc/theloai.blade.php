@extends("Admin.layouts.layouts")
@section('content')
<div class="row p-3 border">
    <!-- Left side: Add new category form -->
    <div class="col-md-6 border-right">
        <h3>Thêm Thể Loại mới</h3>
        <form id="addCategoryForm" action="them-the-loai" method="POST">
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
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="categoryName">Tên Thể Loại</label>
                <input type="text" class="form-control" id="categoryName" name="Ten" placeholder="Nhập tên thể loai">
            </div>
            <div class="form-group">
                <label for="categoryName">Tên Không Dấu</label>
                <input type="text" class="form-control" id="categoryName" name="TenKD" placeholder="Nhập tên thể loai">
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>

    <!-- Right side: Category list -->
    <div class="col-md-6">
        <h3>Quản lý thể loại</h3>
        <table class="table border">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Tên thể loại</th>
                    <th>Tên Không Dấu</th>
                    <th class="text-right">Hành động</th>
                </tr>
            </thead>
            <tbody id="categoryList">
                <!-- Sample data -->
                @foreach ($theloai as $tl)
                <tr>
                    <td>{{$tl->id}}</td>
                    <td>{{$tl->Ten}}</td>
                    <td>{{$tl->TenKhongDau}}</td>
                    <td class="action-buttons text-right">
                        <button class="btn btn-warning btn-sm">
                            <a href="sua-the-loai/{{$tl->id}}" style="padding:5px;color:#fff;">Sửa</a>
                        </button>
                        <button class="btn btn-danger btn-sm ml-2">
                            <a href="xoa/{{$tl->id}}"  style="padding:5px;color:#fff;">Xóa</a>
                        </button>
                    </td>
                </tr>
                @endforeach
                <!-- Add more category rows here dynamically -->
            </tbody>
        </table>
    </div>
</div>
@endsection