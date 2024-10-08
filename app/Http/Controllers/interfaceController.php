<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\TheLoai;
use App\Models\LoaiTin;
use App\Models\User;
use App\Models\LienHe;
use Illuminate\Support\Facades\Auth;


class interfaceController extends Controller
{
    function index()
    {
        $theloai = TheLoai::take(10)->get();
        $tintuc = TinTuc::orderBy('created_at', 'desc')->paginate(10);
        $tinhot = TinTuc::orderBy('SoLuotXem', 'desc')->take(5)->get();
        return view('Interface/home', ['tintuc' => $tintuc, 'theloai' => $theloai, 'tinhot' => $tinhot]);
    }
    function video()
    {
        $theloai = TheLoai::all();
        $tintuc = TinTuc::paginate(12);
        $tinhot = TinTuc::orderBy('SoLuotXem', 'desc')->take(5)->get();
        return view('Interface/video', ['tintuc' => $tintuc, 'theloai' => $theloai, 'tinhot' => $tinhot]);
    }
    function contact()
    {
        return view('Interface/contact');
    }
    function news()
    {
        $theloai = TheLoai::all();
        $tintuc = TinTuc::paginate(12);
        $tinhot = TinTuc::orderBy('SoLuotXem', 'desc')->take(5)->get();
        return view('Interface/news', ['tintuc' => $tintuc, 'theloai' => $theloai, 'tinhot' => $tinhot]);
    }
    function view($location_name)
    {
        $tintuc = TinTuc::where('TieuDeKhongDau',$location_name)->first();
        return view('Interface/view', ['tintuc' => $tintuc]);
    }
    function category($TenKhongDau)
    {
        $theloai = TheLoai::all();
        // $tentheloai = TheLoai::find($id);
        $theloaitieude = TheLoai::where('TenKhongDau', $TenKhongDau)->first();
        $tintuc = TinTuc::paginate(10);
        $tinhot = TinTuc::orderBy('SoLuotXem', 'desc')->take(5)->get();
        return view('Interface/category', ['tintuc' => $tintuc, 'theloai' => $theloai, 'tinhot' => $tinhot, 'tentheloai' => $theloaitieude]);
    }
    function postCategory(Request $request)
    {
        $theloai_id = $request->input('theloai_id');
        if ($theloai_id == 0) {
            return redirect()->to("/news");
        } else {
            return redirect()->to("/category/{$theloai_id}");
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email',
            'sdt' => 'required|string|max:20',
            'dia_chi' => 'required|string|max:255',
            'loi_nhan' => 'required|string',
        ], [
            'ten.required' => 'Bạn chưa nhập tên !',
            'email.required' => 'Bạn chưa nhập email !',
            'sdt.required' => 'Bạn chưa nhập số điện thoại !',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ !',
            'loi_nhan.required' => 'Bạn chưa nhập lời nhắn !',
        ]);

        LienHe::create([
            'ten' => $request->input('ten'),
            'email' => $request->input('email'),
            'sdt' => $request->input('sdt'),
            'dia_chi' => $request->input('dia_chi'),
            'loi_nhan' => $request->input('loi_nhan'),
        ]);

        return redirect()->back()->with('thongbao', 'Thông tin đã được gửi!');
    }

    function login()
    {
        return view('Interface/auth/login');
    }
    function postlogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return redirect('/login')->with('loi', 'Sai mật khẩu ');
        }
    }
    function dangxuat(){
        Auth::logout();
        return redirect('/');

    }
    function register()
    {
        return view('Interface/auth/register');
    }
    function dangki(Request $request)
    {
        if($request->password !== $request->cfpass){
            return redirect('/register')->with('thongbao', 'Mật khẩu được xác nhận không khớp');
        }

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


        $nguoidung = new User;
        $nguoidung->name = $request->name;
        $nguoidung->email = $request->email;
        $nguoidung->phone = $request->phone;
        $nguoidung->level = $request->level;
        $nguoidung->Hinh = $request->hinh;
        $nguoidung->password = $request->password;
        $nguoidung->save();
        return redirect('/login')->with('thongbao', 'Tạo tài khoản thành công !');
    }
}
