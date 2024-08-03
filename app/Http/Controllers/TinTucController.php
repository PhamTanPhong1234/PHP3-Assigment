<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\TinTuc;
use App\Models\TheLoai;
use App\Models\LoaiTin;
class TinTucController extends Controller
{
    function xemTinTuc(){
        $tintuc = TinTuc::orderBy('id','ASC')->get();
        return view('Admin/TinTuc/xemtintuc',['tintuc'=> $tintuc]);
    }
    function themTinTuc(){
        $loaitin = LoaiTin::all();
        return view("Admin/TinTuc/them",['loaitin'=>$loaitin]);
    }
    function postthemTinTuc(){
        
    }
    function suaTinTuc(){
        
    }
    function postsuaTinTuc(){
        
    }
    function xoaTinTuc(){
        
    }
}
