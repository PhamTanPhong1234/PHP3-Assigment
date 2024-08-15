<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\TheLoai;
use App\Models\LoaiTin;



class TinTucController extends Controller
{
    function xemTinTuc()
    {
        $tintuc = TinTuc::orderBy('id', 'DESC')->paginate(10);
        return view('Admin/TinTuc/xemtintuc', ['tintuc' => $tintuc]);
    }
    function themTinTuc()
    {
        $loaitin = LoaiTin::all();
        return view("Admin/TinTuc/them", ['loaitin' => $loaitin]);
    }
    function postthemTinTuc(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|unique:TinTuc,TieuDe',
            'titlekd' => 'required|min:3|unique:TinTuc,TieuDe',
            'LoaiTin' => 'required',
            'descontent' => 'required|min:3',
            'content' => 'required|min:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'title.required' => 'Bạn chưa nhập tiêu đề !',
            'title.min' => 'Bạn chưa nhập đủ kí tự !',
            'title.unique' => 'Nội dung đã nhập trước đây rồi !',
            'titlekd.required' => 'Bạn chưa nhập tiêu đề không đấu !',
            'titlekd.min' => 'Bạn chưa nhập đủ kí tự !',
            'titlekd.unique' => 'Nội dung đã nhập trước đây rồi !',
            'LoaiTin.required' => 'Bạn chưa chọn loại tin !',
            'descontent.required' => 'Bạn chưa nhập nội dung mô tả !',
            'descontent.min' => 'Bạn chưa nhập đủ kí tự !',
            'descontent.unique' => 'Nội dung đã nhập trước đây rồi !',
            'content.required' => 'Bạn chưa nhập nội dung !',
            'content.min' => 'Bạn chưa nhập đủ nội dung tối thiểu (50 từ) !',
            'image.mime' => 'Vui lòng tải ảnh đúng định dạng',
            'image.image' => 'Vui lòng tải ảnh',
            'image.max' => 'Giới hạn dung lượng là 2048mb',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        // Lưu dữ liệu vào cơ sở dữ liệu
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->title;
        $tintuc->TieuDeKhongDau = $request->titlekd;
        $tintuc->TomTat = $request->descontent;
        $tintuc->NoiDung = $request->content;
        if (isset($data['image'])) {
            $tintuc->Hinh = $data['image'];
        } else {
            $tintuc->Hinh = "";
        }
        $tintuc->NoiBat = $request->noibat;
        $tintuc->SoLuotXem = $request->luotxem;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->save();

        return redirect('Admin/tintuc/them-tin-tuc')->with('thongbao', 'Tin tức đã được tạo thành công.');
    }


    function suaTinTuc($id)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('Admin/TinTuc/sua', ['tintuc' => $tintuc, 'loaitin' => $loaitin]);
    }
    function postsuaTinTuc(Request $request, $id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request, [

            'titlekd' => 'required|min:3|unique:TinTuc,TieuDe',
            'LoaiTin' => 'required',
            'descontent' => 'required|min:3|max:200',
            'content' => 'required|min:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'titlekd.required' => 'Bạn chưa nhập tiêu đề không đấu !',
            'titlekd.min' => 'Bạn chưa nhập đủ kí tự !',
            'titlekd.unique' => 'Nội dung đã nhập trước đây rồi !',
            'LoaiTin.required' => 'Bạn chưa chọn loại tin !',
            'descontent.required' => 'Bạn chưa nhập nội dung mô tả !',
            'descontent.min' => 'Bạn chưa nhập đủ kí tự !',
            'descontent.unique' => 'Nội dung đã nhập trước đây rồi !',
            'descontent.max' => 'Chỉ nhập trong giới hạn từ 3 - 200 từ !',
            'content.required' => 'Bạn chưa nhập nội dung !',
            'content.min' => 'Bạn chưa nhập đủ nội dung tối thiểu (50 từ) !',
            'image.mime' => 'Vui lòng tải ảnh đúng định dạng',
            'image.image' => 'Vui lòng tải ảnh',
            'image.max' => 'Giới hạn dung lượng là 2048mb',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        $tintuc = new TinTuc;
        $tintuc->TieuDeKhongDau = $request->titlekd;
        $tintuc->TomTat = $request->descontent;
        $tintuc->NoiDung = $request->content;
        if (isset($data['image'])) {
            $tintuc->Hinh = $data['image'];
        } else {
            $tintuc->Hinh = "";
        }
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->NoiBat = $request->noibat;
        $tintuc->SoLuotXem = $request->luotxem;
        $tintuc->update();
        return redirect('Admin/tintuc/xem-tin-tuc/')->with('thongbao', 'Tin tức đã được sửa thành công.');
    }
    function xoaTinTuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('Admin/tintuc/xem-tin-tuc')->with('thongbao', 'Xóa Thành Công');
    }
}
