<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    //
    protected $fillable = [
        'no_Plat',
        'merk_Kendaraan',
        'nama_Pemilik',
    ];
}
