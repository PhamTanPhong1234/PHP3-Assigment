<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use Illuminate\Support\Facades\DB;

class LoaiTinController extends Controller
{
    function LoaiTin()
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('Admin/DanhMuc/loaitin', ['loaitin' => $loaitin], ['theloai' => $theloai]);
    }
    function themLoaiTin(Request $request)
    {
        $this->validate($request, ['Ten' => 'required|unique:LoaiTin,Ten|min:3|max:100'], ['Ten.required' => 'Bạn chưa nhập tên thể loại.', 'Ten.min' => 'Tên thể Loại Quá Ngắn', 'Ten.max' => 'Tên thể Loại Quá Dài']);
        $this->validate($request, ['TenKD' => 'required|unique:LoaiTin,TenKhongDau|min:3|max:100'], ['TenKD.required' => 'Bạn chưa nhập tên thể loại.', 'TenKD.min' => 'Tên thể Loại Quá Ngắn', 'TenKD.max' => 'Tên thể Loại Quá Dài']);
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = $request->TenKD;
        $loaitin->idTheLoai =$request->category_id;
        $loaitin->save();
        return redirect('Admin/danhmuc/loai-tin')->with('thongbao', 'Thêm Thành Công');
    }
    function suaLoaiTin($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('Admin/DanhMuc/sualoaitin', ['loaitin' => $loaitin],['theloai'=> $theloai]);
    }
    function postSuaLoaiTin(Request $request, $id)
    {
        $loaitin = LoaiTin::find($id);
        $this->validate($request, ['Ten' => 'required|unique:LoaiTin,Ten|min:3|max:100'], ['Ten.required' => 'Bạn chưa nhập tên thể loại.', 'Ten.unique' => 'Tên đã tồn tại' . '', 'Ten.min' => 'Tên thể Loại Quá Ngắn', 'Ten.max' => 'Tên thể Loại Quá Dài']);
        $this->validate($request, ['TenKD' => 'required|unique:LoaiTin,TenKhongDau|min:3|max:100'], ['TenKD.required' => 'Bạn chưa nhập tên không dấu thể loại.', 'Ten.unique' => 'Tên Không Dấu đã tồn tại', 'TenKD.min' => 'Tên không dấu thể Loại Quá Ngắn', 'TenKD.max' => 'Tên không dấu thể Loại Quá Dài']);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = $request->TenKD;
        $loaitin->idTheLoai =$request->category_id;
        $loaitin->save();
        return redirect('Admin/danhmuc/sua-loai-tin/' . $id)->with('thongbao', 'Sửa Loại Tin Thành Công');
    }
    public function xoaLoaiTin($id)
    {
        $loaitin = LoaiTin::find($id);
        if ($loaitin) {
            $loaitin->delete();
            return redirect('Admin/danhmuc/loai-tin')->with('thongbao', 'Xóa Thành Công');
        } else {
            return redirect('Admin/danhmuc/loai-tin')->withErrors('Không tìm thấy loại tin để xóa.');
        }
    }
}
