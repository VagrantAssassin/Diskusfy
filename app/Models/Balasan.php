<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    use HasFactory;

    protected $table = 'balasans';
    protected $primaryKey = 'id_balasan';
    public $timestamps = true;

    protected $fillable = [
        'id_diskusi',
        'isi_balasan',
        'uid',
        'tanggal'
    ];

    /**
     * Relasi ke model Diskusi
     */
    public function diskusi()
    {
        return $this->belongsTo(Diskusi::class, 'id_diskusi');
    }

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'uid');
    }
}
