<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangKeluar extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'barang_keluar';
    protected $fillable = [
        'no_barang_keluar',
        'id_barang',
        'id_user',
        'jml_brg_keluar',
        'total',
    ];
    protected $dates = ['deleted_at'];
}
