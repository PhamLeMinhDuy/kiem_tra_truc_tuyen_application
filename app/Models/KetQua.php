<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetQua extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ket_qua';

    protected $fillable = [
        'ma_lop_hoc_phan',
        'ma_bai_kiem_tra',
        'ten_bai_kiem_tra',
        'ma_giang_vien_tao',
        'danh_sach_cau_hoi',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',

    ];
}
