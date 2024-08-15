@extends("Admin.layouts.layouts")
@section('content')
<div class="row p-3 border">
    <!-- Left side: Add new category form -->
    <div class="col-md-6 border-right">
        <h3>Thêm loại tin mới</h3>
        <form id="addCategoryForm" action="them-loai-tin" method="POST">
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
                <label for="categoryName">Tên loại tin</label>
                <input type="text" class="form-control" id="categoryName" name="Ten" placeholder="Nhập tên Loại Tin ">
            </div>
            <div class="form-group">
                <label for="categoryName">Tên Không Dấu</label>
                <input type="text" class="form-control" id="categoryName" name="TenKD" placeholder="Nhập tên Loại Tin">
            </div>
            <div class="form-group">
                <label for="categorySelect">Chọn Thể Loại</label>
                <select id="categorySelect" class="form-control" name="category_id">
                    <option value="">Chọn thể loại...</option>
                    @foreach($theloai as $tl)
                    <option value="{{ $tl->id }}">{{ $tl->Ten}}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>

    <!-- Right side: Category list -->
    <div class="col-md-6">
        <h3>Quản lý loại tin</h3>
        <table class="table border">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Tên loại tin</th>
                    <th>Tên Không Dấu</th>
                    <th>Thể loại</th>
                    <th class="text-right">Hành động</th>
                </tr>
            </thead>
            <tbody id="categoryList">
                <!-- Sample data -->
                @php
                $stt = 1
                @endphp
                @foreach ($loaitin as $lt)
                <tr>
                    <td>{{$stt}}</td>
                    <td>{{$lt->Ten}}</td>
                    <td>{{$lt->TenKhongDau}}</td>
                    <td>{{$lt->theloai->Ten}}</td>
                    <td class="action-buttons text-right">
                        <button class="btn btn-warning btn-sm">
                            <a href="sua-loai-tin/{{$lt->id}}" style="padding:5px;color:#fff;">Sửa</a>
                        </button>
                        <button class="btn btn-danger btn-sm ml-2">
                            <a href="xoa-loai-tin/{{$lt->id}}" style="padding:5px;color:#fff;">Xóa</a>
                        </button>
                    </td>
                </tr>
                @php
                $stt++;
                @endphp
                @endforeach
                <!-- Add more category rows here dynamically -->
            </tbody>
        </table>
        {{$loaitin->links()}}
    </div>
</div>
@endsection