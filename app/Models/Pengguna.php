<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';

    // Primary key adalah 'uid' (string)
    protected $primaryKey = 'uid';
    public $incrementing = false; // Karena bukan auto increment

    protected $fillable = [
        'uid',
        'username',
        'email',
        'nama',
        'tanggal'
    ];
}
