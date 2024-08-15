@extends("Admin.layouts.layouts")
@section('content')
<h2>Thêm Tin Tức</h2>
@if (count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $err )
    {{$err}} <br>
    @endforeach
</div>
@endif
@if(session('thongbao'))
<div class="alert alert-warning">
    {{session('thongbao')}}
</div>
@endif
<form action="them" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="title">Tiêu Đề Không Dấu</label>
        <input type="text" class="form-control" id="title" name="titlekd" required>
    </div>
    <div class="form-group">
        <label for="categorySelect">Chọn Loại Tin</label>
        <select id="categorySelect" class="form-control" name="LoaiTin">
            <option value="">Chọn Loại Tin...</option>
            @foreach($loaitin as $lt)
            <option value="{{ $lt->id }}">{{ $lt->Ten}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Hình Ảnh</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="content">Mô Tả</label>
        <textarea name="descontent"  class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="content summernote">Nội Dung</label>
        <textarea name="content" id="summernote-content" class="form-control"></textarea>
    </div>
    <input type="hidden" name="luotxem" value="0">


    <div class="form-group">
        <label>Nổi Bật</label>
        <label class="radio-inline"><input name="noibat" type="radio" value="1" checked="">CÓ</label>
        <label class="radio-inline"><input name="noibat" type="radio" value="0" checked="">KHÔNG</label>
    </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
    <button type="" class="btn btn-primary">Làm mới</button>
</form>


@endsection