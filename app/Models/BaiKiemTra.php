<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaiKiemTra extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bai_kiem_tra';

    protected $fillable = [
        'ma_lop_hoc_phan',
        'bai_kiem_tra_giua_ky',
        'bai_kiem_tra_cuoi_ky',
        'bai_kiem_tra_khac',

    ];
}
