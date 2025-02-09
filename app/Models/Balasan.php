<?php

// app/Models/Balasan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diskusi;

class Balasan extends Model
{
    use HasFactory;

    protected $table = 'balasans';
    protected $primaryKey = 'id_balasan';

    protected $fillable = [
        'id_diskusi',
        'uid',
        'isi_balasan'
    ];

    // Relasi: Balasan termasuk ke dalam satu diskusi
    public function diskusi()
    {
        return $this->belongsTo(Diskusi::class, 'id_diskusi', 'id_diskusi');
    }

    public function replies()
    {
        return $this->hasMany(Balasan2::class, 'id_balasan', 'id_balasan');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'uid', 'uid');
    }
    
}

