@extends("Admin.layouts.layouts")
@section('content')
<h2>Sửa Thể Loại</h2>
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
<form action="{{$theloai->id}}" method="POST">

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <hr>
    <div class="mb-3">
        <label for="categoryName" class="form-label">
            <h4>Tên Thể Loại</h4>
        </label>
        <input type="text" class="form-control" id="categoryName" name="Ten" placeholder="Nhập tên thể loại" value="{{$theloai->Ten}}" style="font-weight: bolder;">
    </div>

    <div class="mb-3 ">
        <label for="categorySlug" class="form-label mt-15">
            <h4>Tên Không Dấu</h4>
        </label>
        <input type="text" class="form-control" id="categorySlug" name="TenKD" placeholder="Nhập tên không dấu" value="{{$theloai->TenKhongDau}}" style="font-weight: bolder;">
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="" class="btn btn-secondary">Hủy</a>
</form>
@endsection