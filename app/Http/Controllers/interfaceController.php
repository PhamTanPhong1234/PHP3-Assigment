<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\TinTuc;
use App\Models\TheLoai;
use App\Models\LoaiTin;


class interfaceController extends Controller
{
    function index()
    {
        $tintuc = TinTuc::paginate(10);
        return view('Interface/home', ['tintuc' =>$tintuc]);
    }
    function hot()
    {
        return view('Interface/hotnews');
    }
    function contact()
    {
        return view('Interface/contact');
    }
    function news()
    {
        return view('Interface/blog');
    }
    function view($id)
    {
        $tintuc = TinTuc::find($id);
        return view('Interface/view', ['tintuc' => $tintuc]);
    }
    function login()
    {
        return view('Interface/auth/login');
    }
    function register()
    {
        return view('Interface/auth/register');
    }
}
