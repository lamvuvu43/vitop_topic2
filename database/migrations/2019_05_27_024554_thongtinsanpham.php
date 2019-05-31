<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thongtinsanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtinsanpham', function (Blueprint $table) {
            $table->bigIncrements('ttsp_id')->autoIncrement();
            $table->string('ttsp_tensp');
            $table->string('ttsp_motasp')->nullable();
            $table->string('ttsp_hinhanhsp');
//            $table->string('id_lsp')->unsigned();
//            $table->foreign('id_lsp')->references('id_lsp')->on('loaisanpham')->onDelete(cascade)->onUpdate(cascade);
//            dòng cuối tạo khoá ngọia với bang loại sản phẩn. onDelete OnUpdate là khi khoa chính xoa thì khoá ngoại xoá theo
//            $table->timestamps(); //không cần thiết cột này(tự sinh ra)==> tao khoá ngoại trong file migrate riêng
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thongtinsanpham');
    }
}
