<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienhe', function (Blueprint $table) {
            $table->id();
            $table->string('ten'); // Tên của bạn
            $table->string('email'); // Địa chỉ email
            $table->string('sdt'); // Số điện thoại
            $table->string('dia_chi'); // Địa chỉ của bạn
            $table->text('loi_nhan'); // Lời nhắn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lienhe');
    }
}
