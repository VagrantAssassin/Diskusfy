<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;

    protected $table = 'diskusis'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_diskusi'; // Sesuaikan jika id bukan 'id'

    protected $fillable = [
        'judul',
        'isi_diskusi',
        'id_kategori',
        'uid',
    ];
}
