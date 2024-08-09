<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LienHe;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    function xemNguoiDung()
    {
        $nguoidung = User::paginate(10);
        return view('Admin/nguoidung/nguoidung', ['nguoidung' => $nguoidung]);
    }
    function postthemNguoiDung(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất phải 8 kí tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại phải là số',
            'image.mime' => 'Vui lòng tải ảnh đúng định dạng',
            'image.image' => 'Vui lòng tải ảnh',
            'image.max' => 'Giới hạn dung lượng là 2048mb',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $nguoidung = new User;
        $nguoidung->name = $request->name;
        $nguoidung->email = $request->email;
        $nguoidung->phone = $request->phone;
        $nguoidung->level = $request->level;
        $nguoidung->password = $request->password;
        if (isset($data['image'])) {
            $nguoidung->Hinh = $data['image'];
        } else {
            $nguoidung->Hinh = "avatar.jpg";
        }
        $nguoidung->save();
        return redirect('Admin/nguoidung/xem-nguoi-dung')->with('thongbao', 'Người Dùng đã được tạo thành công.');
    }


    function suaNguoiDung($id)
    {
        $nguoidung = User::find($id);
        return view('Admin/NguoiDung/suanguoidung', ['nguoidung' => $nguoidung]);
    }
    function postsuaNguoiDung(Request $request, $id)
    {
        $nguoidung = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất phải 8 kí tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại phải là số',
            'image.mime' => 'Vui lòng tải ảnh đúng định dạng',
            'image.image' => 'Vui lòng tải ảnh',
            'image.max' => 'Giới hạn dung lượng là 2048mb',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $nguoidung->name = $request->name;
        $nguoidung->email = $request->email;
        $nguoidung->phone = $request->phone;
        $nguoidung->level = $request->level;
        $nguoidung->password = $request->password;
        $nguoidung->Hinh = $data['image'];
        $nguoidung->update();
        return redirect('Admin/nguoidung/xem-nguoi-dung')->with('thongbao', 'Sửa người dùng thành công.');
    }
    function xoaNguoiDung($id)
    {
        $nguoidung = User::find($id);
        $nguoidung->delete();
        return redirect('Admin/nguoidung/xem-nguoi-dung')->with('thongbao', 'Xóa thành công.');
    }
    function dangnhapAdmin()
    {
        return view('Admin/dangnhapAdmin');
    }
    function postdangnhapAdmin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Bạn chưa nhập Email',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('Admin/dashboard');
        }else{
            return redirect('Admin/dang-nhap')->with('thongbao','Sai mật khẩu ');
        }
    }
    function dangxuatAdmin(){
        Auth::logout();
        return redirect('Admin/dang-nhap');

    }
    function danhsachLienhe(){
        $lienHes = LienHe::all();
        return view('Admin/LienHe/xem', ['lienHes' => $lienHes]);
    }
    function xoaLienHe($id){
        $lienHe = LienHe::find($id);
        $lienHe->delete();
        return redirect('Admin/lienhe/danhsach')->with('thongbao', 'Xóa thành công.');
    }

}
