<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use Illuminate\Http\Request;


class DiskusiController extends Controller
{
    public function add(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'uid' => 'required|exists:penggunas,uid', // Validasi untuk memastikan uid ada di tabel penggunas
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:penggunas',
            'nama' => 'required|string|max:255',
            'id_kategori' => 'nullable|exists:kategoris,id_kategori', // Validasi untuk id_kategori
            'judul' => 'required|string|max:50',
            'isi_diskusi' => 'required|string|max:255', // Pastikan isi_diskusi ada dalam request
        ]);

        // Menyimpan data ke database
        $diskusi = new Diskusi();
        $diskusi->id_diskusi = $request->id_diskusi; // Jika id_diskusi bukan auto-increment, pastikan untuk mengirimkan data ini
        $diskusi->id_kategori = $request->id_kategori; // Jika ada, masukkan id_kategori
        $diskusi->uid = $request->uid; // Menyimpan uid yang mengacu pada penggunas
        $diskusi->judul = $request->judul; // Menyimpan judul diskusi
        $diskusi->isi_diskusi = $request->isi_diskusi; // Menyimpan isi diskusi
        $diskusi->tanggal = $request->tanggal ?? now(); // Jika tanggal tidak ada, set default ke sekarang
        $diskusi->save();


        if ($diskusi->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
