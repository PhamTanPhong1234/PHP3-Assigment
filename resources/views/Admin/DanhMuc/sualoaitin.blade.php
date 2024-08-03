@extends("Admin.layouts.layouts")
@section('content')
<h2>Sửa Loại Tin</h2>
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
<form action="{{$loaitin->id}}" method="POST">

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <hr>
    <div class="mb-3">
        <label for="categoryName" class="form-label">
            <h4>Tên Loại Tin</h4>
        </label>
        <input type="text" class="form-control" id="categoryName" name="Ten" placeholder="Nhập tên Loại Tin" value="{{$loaitin->Ten}}" style="font-weight: bolder;">
    </div>

    <div class="mb-3 ">
        <label for="categorySlug" class="form-label mt-15">
            <h4>Tên Không Dấu</h4>
        </label>
        <input type="text" class="form-control" id="categorySlug" name="TenKD" placeholder="Nhập tên không dấu" value="{{$loaitin->TenKhongDau}}" style="font-weight: bolder;">
    </div>
    <div class="form-group">
        <label for="categorySelect">Chọn Thể Loại</label>
        <select id="categorySelect" class="form-control" name="category_id">
            <option value="">Chọn Thể Loại ...</option>
            @foreach($theloai as $tl)
            <option value="{{ $tl->id }}">{{ $tl->Ten}}</option>
            @endforeach
        </select>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="" class="btn btn-secondary">Hủy</a>
</form>
@endsection