<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_kategori';
    
    protected $fillable = ['nama_kategori']; // Tambahkan ini untuk mengizinkan mass assignment
    
    public $timestamps = false; // Jika tabel tidak memiliki created_at & updated_at
    
    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
}

}
