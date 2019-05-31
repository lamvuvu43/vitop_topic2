<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ThongTinSanPham extends Model
{
    protected $table = 'thongtinsanpham';// cho model map đúng bảng trong migrate

    protected $primaryKey ='ttsp_id'; //khai bao khoá chính
    //Lọc cột dữ liệu trong model. Những cột bạn muốn hiện thị;
    public $fillable =['ttsp_id','ttsp_tensp','ttsp_hinhanhsp','ttsp_motasp'];
    public $timestamps=false;// mặc định là true

//    protected $dateFormat = 'd-m-Y'; nếu muốn lưu thay đổi định dạng timestamp
}
