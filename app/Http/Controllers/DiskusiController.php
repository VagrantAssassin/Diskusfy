<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi; // Pastikan model Diskusi ada

class DiskusiController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_diskusi' => 'required|string',
            'id_kategori' => 'nullable|integer',
            'user_uid' => 'required|string'
        ]);

        $diskusi = new Diskusi();
        $diskusi->uid = $validatedData['user_uid'];
        $diskusi->judul = $validatedData['judul'];
        $diskusi->isi_diskusi = $validatedData['isi_diskusi'];
        $diskusi->id_kategori = $validatedData['id_kategori'] ?? null;

        if ($diskusi->save()) {
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan ke database']);
        }
    }

    public function index()
    {
        // Mengambil data diskusi dari database
        $diskusis = Diskusi::all(); // Bisa menggunakan pagination jika data banyak

        // Mengirim data ke view 'home.home'
        return view('home.home', compact('diskusis'));
    }


}

