@extends("Admin.layouts.layouts")
@section('content')
<div class="row mb-3">
    <!-- Sorting Dropdown -->
    <div class="col-md-12">
        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sắp xếp theo
            </button>
            <div class="dropdown-menu" aria-labelledby="sortDropdown">
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item"><a class="dropdown-item" href="#">Tin mới</a></li>
                    <li class="list-group-item"><a class="dropdown-item" href="#">Tin cũ</a></li>
                    <li class="list-group-item"><a class="dropdown-item" href="#">Tin xem nhiều</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row p-3 border">
    <!-- Right side: Article list -->
    <div class="col-md-12">
        <h3>Danh sách bài viết</h3>
        <table class="table border">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>
                    <th>Thể Loại</th>
                    <th>Loại Tin</th>
                    <th>xem</th>
                    <th>Nổi bật</th>
                    <th class="text-right">Hành động</th>
                </tr>
            </thead>
            <tbody id="articleList">
                <!-- Sample data -->
                @foreach ($tintuc as $tt)
                <tr>
                    <td>{{$tt->id}}</td>
                    <td>
                        {{$tt->TieuDe}}
                    </td>
                    <td>{{$tt->TomTat}}</td>
                    <td>{{$tt->NoiDung}}</td>
                    <td>{{$tt->LoaiTin->TheLoai->Ten}}</td>
                    <td>{{$tt->LoaiTin->Ten}}</td>
                    <td>{{$tt->SoLuotXem}}</td>
                    <td>
                        @if($tt->NoiBat==0)
                        {{'Không'}}
                        @else
                        {{'Có'}}
                        @endif
                    </td>
                    <td class="text-right action-buttons">
                        <button class="btn btn-warning btn-sm"><a href="">Sửa</a></button>
                        <button class="btn btn-danger btn-sm"><a href="">Xóa</a></button>
                    </td>
                </tr>
                @endforeach
                <!-- Add more article rows here dynamically -->
            </tbody>
        </table>
    </div>
</div>
@endsection