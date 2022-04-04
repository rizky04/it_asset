<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lokasi';
    protected $fillable = [
        'nama_lokasi',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted_at'];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
