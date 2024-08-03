<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use Illuminate\Support\Facades\DB;




class TheloaiController extends Controller
{
    function TheLoai()
    {

        $theloai = TheLoai::all();
        return view('Admin/DanhMuc/theloai', ['theloai' => $theloai]);
    }
    function themTheLoai(Request $request)
    {
        $this->validate($request, ['Ten' => 'required|unique:TheLoai,Ten|min:3|max:100'], ['Ten.required' => 'Bạn chưa nhập tên thể loại.', 'Ten.min' => 'Tên thể Loại Quá Ngắn', 'Ten.max' => 'Tên thể Loại Quá Dài']);
        $this->validate($request, ['TenKD' => 'required|unique:TheLoai,TenKhongDau|min:3|max:100'], ['TenKD.required' => 'Bạn chưa nhập tên thể loại.', 'TenKD.min' => 'Tên thể Loại Quá Ngắn', 'TenKD.max' => 'Tên thể Loại Quá Dài']);
        $theloai = new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = $request->TenKD;
        $theloai->save();
        return redirect('Admin/danhmuc/the-loai')->with('thongbao', 'Thêm Thành Công');
    }
    function suaTheLoai($id)
    {
        $theloai = TheLoai::find($id);
        return view('Admin/DanhMuc/suatheloai', ['theloai' => $theloai]);
    }
    function postSuaTheLoai(Request $request, $id)
    {
        $theloai = TheLoai::find($id);
        $this->validate($request, ['Ten' => 'required|unique:TheLoai,Ten|min:3|max:100'], ['Ten.required' => 'Bạn chưa nhập tên thể loại.', 'Ten.unique' => 'Tên đã tồn tại' . '', 'Ten.min' => 'Tên thể Loại Quá Ngắn', 'Ten.max' => 'Tên thể Loại Quá Dài']);
        $this->validate($request, ['TenKD' => 'required|unique:TheLoai,Ten|min:3|max:100'], ['TenKD.required' => 'Bạn chưa nhập tên không dấu thể loại.', 'Ten.unique' => 'Tên Không Dấu đã tồn tại', 'TenKD.min' => 'Tên không dấu thể Loại Quá Ngắn', 'TenKD.max' => 'Tên không dấu thể Loại Quá Dài']);
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = $request->TenKD;
        $theloai->save();
        return redirect('Admin/danhmuc/sua-the-loai/' . $id)->with('thongbao', 'Sửa Thành Công');
    }
    public function xoaTheLoai($id)
    {
        DB::table('loaitin')->where('idTheLoai', $id)->delete();
        $theloai = TheLoai::find($id);
        if ($theloai) {
            $theloai->delete();
            return redirect('Admin/danhmuc/the-loai')->with('thongbao', 'Xóa Thành Công');
        } else {
            return redirect('Admin/danhmuc/the-loai')->withErrors('Không tìm thấy loại tin để xóa.');
        }
    }

}
