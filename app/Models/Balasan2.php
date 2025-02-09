<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Balasan;

class Balasan2 extends Model
{
    use HasFactory;

    protected $table = 'balasans_2';
    protected $primaryKey = 'id_balasan2';

    protected $fillable = [
        'id_balasan',
        'uid',
        'isi_balasan2'
    ];
    public function balasan()
    {
        return $this->belongsTo(Balasan::class, 'id_balasan', 'id_balasan');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'uid', 'uid');
    }
}
