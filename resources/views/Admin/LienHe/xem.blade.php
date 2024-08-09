@extends('Admin.Layouts.layouts')
@section('content')
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
<h1>Danh sách liên hệ </h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Lời Nhắn</th>
            <th>Thời Gian Tạo</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lienHes as $lienHe)
        <tr>
            <td>{{ $lienHe->id }}</td>
            <td>{{ $lienHe->ten }}</td>
            <td>{{ $lienHe->email }}</td>
            <td>{{ $lienHe->sdt }}</td>
            <td>{{ $lienHe->dia_chi }}</td>
            <td>{{ $lienHe->loi_nhan }}</td>
            <td>{{ $lienHe->created_at->format('d-m-Y H:i:s') }}</td>
            <td><a href="xoa-lien-he/{{$lienHe->id}}">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection