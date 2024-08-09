<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    // Đặt tên bảng tương ứng với model
    protected $table = 'lienhe';

    // Đặt các thuộc tính có thể gán hàng loạt (mass assignable)
    protected $fillable = [
        'ten',
        'email',
        'sdt',
        'dia_chi',
        'loi_nhan',
    ];
}
