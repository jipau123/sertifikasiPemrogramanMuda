<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $fillable = [
        'nama_mahasiswa',
        'NIM',
        'id_prodi',
    ];
}
