<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LienHeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lienhe')->insert([
            [
                'ten' => 'Nguyễn Văn A',
                'email' => 'nguyenvana@example.com',
                'sdt' => '0123456789',
                'dia_chi' => '123 Đường ABC, Thành phố XYZ',
                'loi_nhan' => 'Đây là lời nhắn mẫu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm các dữ liệu mẫu khác nếu cần
        ]);
    }
}
