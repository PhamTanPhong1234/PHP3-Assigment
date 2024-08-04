<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TheloaiController;
use App\Models\LoaiTin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('Admin/dang-nhap', [UsersController::class, 'dangnhapAdmin']);
Route::post('Admin/dang-nhap', [UsersController::class, 'postdangnhapAdmin']);
Route::group(['prefix' => 'Admin','middleware'=>'AdminLogin'], function () {
    Route::get('dashboard', function () {
        return view('Admin/dashboard');
    });
    Route::get('/logout', [UsersController::class, 'dangxuatAdmin'])->name('logout') ;

    Route::group(['prefix' => 'danhmuc'], function () {
        Route::get('/the-loai', [TheloaiController::class, 'TheLoai']);
        Route::post('/them-the-loai', [TheloaiController::class, 'themTheLoai']);
        Route::get('/sua-the-loai/{id}', [TheloaiController::class, 'suaTheLoai']);
        Route::post('/sua-the-loai/{id}', [TheloaiController::class, 'postSuaTheLoai']);
        Route::get('/xoa-the-loai/{id}', [TheloaiController::class, 'xoaTheLoai']);
        Route::get('/loai-tin', [LoaiTinController::class, 'LoaiTin']);
        Route::post('/them-loai-tin', [LoaiTinController::class, 'themLoaiTin']);
        Route::get('/sua-loai-tin/{id}', [LoaiTinController::class, 'suaLoaiTin']);
        Route::post('/sua-loai-tin/{id}', [LoaiTinController::class, 'postSuaLoaiTin']);
        Route::get('/xoa-loai-tin/{id}', [LoaiTinController::class, 'xoaLoaiTin']);
    });
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('/xem-tin-tuc', [TinTucController::class, 'xemTinTuc']);
        Route::get('/them-tin-tuc', [TinTucController::class, 'themTinTuc']);
        Route::post('/them', [TinTucController::class, 'postthemTinTuc']);
        Route::get('/sua-tin-tuc/{id}', [TinTucController::class, 'suaTinTuc']);
        Route::post('/sua-tin-tuc/{id}', [TinTucController::class, 'postsuaTinTuc']);
        Route::get('/xoa-tin-tuc/{id}', [TinTucController::class, 'xoaTinTuc']);
    });
    Route::group(['prefix' => 'nguoidung'], function () {
        Route::get('/xem-nguoi-dung', [UsersController::class, 'xemNguoiDung']);
        Route::post('/them-nguoi-dung', [UsersController::class, 'postthemNguoiDung']);
        Route::get('/sua-nguoi-dung/{id}', [UsersController::class, 'suaNguoiDung']);
        Route::post('/sua-nguoi-dung/{id}', [UsersController::class, 'postsuaNguoiDung']);
        Route::get('/xoa-nguoi-dung/{id}', [UsersController::class, 'xoaNguoiDung']);
    });
});
