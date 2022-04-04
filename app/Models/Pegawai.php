<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Pegawai';
    protected $fillable = [
        'nama_pegawai',
        'nip',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted_at'];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
