<?php

// app/Models/Diskusi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Balasan;

class Diskusi extends Model
{
    use HasFactory;

    protected $table = 'diskusis';
    protected $primaryKey = 'id_diskusi';

    protected $fillable = [
        'judul',
        'isi_diskusi',
        'id_kategori',
        'uid',
        'nama_kategori'
    ];

    // Relasi: Satu diskusi memiliki banyak balasan
    public function balasans()
    {
        return $this->hasMany(Balasan::class, 'id_diskusi', 'id_diskusi');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'uid', 'uid');
    }
}
