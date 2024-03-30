<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaiThi extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bai_thi';

    protected $fillable = [
        'ma_bai_thi',
        'ten_bai_thi',
        'danh_sach_cau_hoi',

    ];
}
