@extends("Admin.layouts.layouts")
@section('content')
<h2>Sửa Tin Tức</h2>

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
<h3 ><u>{{$tintuc->TieuDe}}</u></h3>
<form action="{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="title">Tiêu Đề Không Dấu</label>
        <input type="text" class="form-control" id="title" name="titlekd" required value="{{$tintuc->TieuDeKhongDau}}">
    </div>
    <div class="form-group">
        <label for="categorySelect">Chọn Loại Tin</label>
        <select id="categorySelect" class="form-control" name="LoaiTin">
            @foreach($loaitin as $lt)
            <option @if($tintuc->loaitin->id == $lt->id) {{'Selected'}}
                @endif
                value="{{ $lt->id }}">{{ $lt->Ten}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Hình Ảnh</label>
        <p> <img src="{{ asset('images/' . $tintuc->Hinh) }}" alt="Hình ảnh" style="width: 100px; height: auto;"></p>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="content">Mô Tả</label>
        <textarea name="descontent" class="form-control">{{$tintuc->TomTat}}</textarea>
    </div>
    <div class="form-group">
        <label for="content summernote">Nội Dung</label>
        <textarea name="content" id="summernote-content" class="form-control">{{$tintuc->NoiDung}}</textarea>
    </div>
    <div class="form-group">
        <label for="content summernote">Lượt xem</label>
        <textarea name="luotxem" class="form-control">{{$tintuc->LuotXem}}</textarea>
    </div>


    <div class="form-group">
        <label>Nổi Bật</label>
        <label class="radio-inline"><input name="noibat" type="radio" value="0" @if ($tintuc->NoiBat == 0)
            {{'checked'}}
            @endif
            >KHÔNG</label>
        <label class="radio-inline"><input name="noibat" type="radio" value="1" @if ($tintuc->NoiBat == 1)
            {{'checked'}}
            @endif
            >CÓ</label>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
    <button type="" class="btn btn-primary">Làm mới</button>
</form>

@endsection