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
        $tintuc = TinTuc::paginate(10);
        $tinhot = TinTuc::orderBy('SoLuotXem', 'desc')->take(5)->get();
        return view('Interface/home', ['tintuc' => $tintuc, 'theloai' => $theloai, 'tinhot' => $tinhot]);
    }
    function video() {
        $theloai = TheLoai::take(10)->get();
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
        $theloai = TheLoai::take(10)->get();
        $tintuc = TinTuc::paginate(12);
        $tinhot = TinTuc::orderBy('SoLuotXem', 'desc')->take(5)->get();
        return view('Interface/news', ['tintuc' => $tintuc, 'theloai' => $theloai, 'tinhot' => $tinhot]);
    }
    function view($id)
    {
        $tintuc = TinTuc::find($id);
        return view('Interface/view', ['tintuc' => $tintuc]);
    }
    function category($id)
    {
        $theloai = TheLoai::take(10)->get();
        // $tentheloai = TheLoai::find($id);
        $theloaitieude = TheLoai::with('LoaiTin.TinTuc')->find($id);
        $tintuc = TinTuc::paginate(10);
        $tinhot = TinTuc::orderBy('SoLuotXem', 'desc')->take(5)->get();
        return view('Interface/category', ['tintuc' => $tintuc, 'theloai' => $theloai, 'tinhot' => $tinhot, 'tentheloai' => $theloaitieude]);
    }
    function postCategory(Request $request)
    {
        $theloai_id = $request->input('theloai_id');
        if($theloai_id == 0){
            return redirect()->to("/news");
        }else{
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
        ],[
            'ten.required'=> 'Bạn chưa nhập tên !',
            'email.required'=> 'Bạn chưa nhập email !',
            'sdt.required'=> 'Bạn chưa nhập số điện thoại !',
            'dia_chi.required'=> 'Bạn chưa nhập địa chỉ !',
            'loi_nhan.required'=> 'Bạn chưa nhập lời nhắn !',
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
    function postlogin( Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }else{
            return redirect('/login')->with('thongbao','Sai mật khẩu ');
        }
    }
    function register()
    {
        return view('Interface/auth/register');
    }
}
