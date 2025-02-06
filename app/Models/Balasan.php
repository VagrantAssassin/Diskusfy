<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    use HasFactory;

    protected $table = 'balasans'; // Sesuaikan dengan nama tabel
    protected $primaryKey = 'id_balasan'; // Jika berbeda, sesuaikan

    protected $fillable = [
        'id_diskusi',
        'uid',
        'isi_balasan',
    ];
}
