<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_vote';

    // Jika Anda tidak ingin menggunakan kolom timestamps, atur $timestamps = false;
    // Namun karena migration sudah menggunakan timestamps, biarkan default true.

    // Tentukan field yang dapat diisi mass assignment
    protected $fillable = [
        'id_balasan',
        'uid',
        'isi_vote',
    ];
}
