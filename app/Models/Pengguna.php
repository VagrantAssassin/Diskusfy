<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';

    protected $primaryKey = 'uid';
    public $incrementing = false;

    protected $fillable = [
        'uid',
        'username',
        'email',
        'nama',
        'tanggal'
    ];
}
