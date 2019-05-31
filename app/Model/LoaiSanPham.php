<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected  $table='loaisanpham';//cho model map đúng với bảng trong migrate
    public $fillable=['lsp_ten'];
    public $timestamps=true;
}
