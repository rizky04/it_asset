<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangMasuk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang_masuk';
    protected $fillable = [
        'no_barang_masuk',
        'no_asset',
        'id_barang',
        'id_lokasi',
        'kondisi',
        'id_user',
        'tgl_brg_masuk',
        'jml_brg_masuk',
        'total',
        'keterangan',
    ];
    protected $dates = ['deleted_at'];
}
