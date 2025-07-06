<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    protected $table = 'kampus';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'kategori',
        'latitude',
        'longitude',
        'jurusan'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}
