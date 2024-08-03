@extends("Admin.layouts.layouts")
@section('content')
<h2>Thêm Tin Tức</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="title">Tiêu Đề Không Dấu</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="categorySelect">Chọn Loại Tin</label>
        <select id="categorySelect" class="form-control" name="category_id">
            <option value="">Chọn Loại Tin...</option>
            @foreach($loaitin as $lt)
            <option value="{{ $lt->id }}">{{ $lt->Ten}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="content">Mô Tả</label>
        <textarea name="des-content" id="summernote" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="content summernote">Nội Dung</label>
        <textarea name="content" id="summernote-content" class="form-control"></textarea>
    </div>
    <input type="hidden" name="luotxem" value="0">


    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
