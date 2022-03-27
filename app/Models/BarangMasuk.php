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
        'id_barang',
        'id_user',
        'jml_brg_masuk',
        'total',
    ];
    protected $dates = ['deleted_at'];
}