<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $primaryKey = 'id_vote';

    protected $fillable = [
        'id_balasan',
        'uid',
        'isi_vote',
    ];
}
