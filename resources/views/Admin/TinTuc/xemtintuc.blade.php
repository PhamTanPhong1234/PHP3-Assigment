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
        <table class="table border">
            <thead class="thead-light">
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Thể Loại</th>
                <th>Loại Tin</th>
                <th>Lượt xem</th>
                <th>Nổi bật</th>
                <th class="text-right">Hành động</th>
                </tr>
            </thead>
            <tbody id="articleList">
                <!-- Sample data -->
                @php
                $stt =1
                @endphp
                @foreach ($tintuc as $tt)
                <tr>
                    <td>{{$stt}}</td>
                    <td>
                        {{$tt->TieuDe}}
                    </td>
                    <td>{{$tt->TomTat}}</td>
                    <td><img src="{{ asset('images/' . $tt->Hinh) }}" alt="Hình ảnh" style="width: 100px; height: auto;"></td>
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
                        <button class="btn btn-warning btn-sm"><a href="{{url('Admin/tintuc/sua-tin-tuc/' . $tt->id)}}">Sửa</a></button>
                        <button class="btn btn-danger btn-sm"><a href="{{url('Admin/tintuc/xoa-tin-tuc/' . $tt->id)}}">Xóa</a></button>
                    </td>
                </tr>
                @php
                $stt++
                @endphp
                @endforeach
                <!-- Add more article rows here dynamically -->
            </tbody>
        </table>
        {{$tintuc->links()}}
    </div>
</div>
@endsection