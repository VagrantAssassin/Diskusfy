<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi;
use App\Models\Kategori; // Import model Kategori

class DiskusiController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_diskusi' => 'required|string',
            'kategori' => 'required|string|max:50', // Ubah dari id_kategori ke kategori (string)
            'user_uid' => 'required|string'
        ]);

        // Cek apakah kategori sudah ada
        $kategori = Kategori::where('nama_kategori', $validatedData['kategori'])->first();

        // Jika kategori belum ada, tambahkan ke database
        if (!$kategori) {
            $kategori = Kategori::create([
                'nama_kategori' => $validatedData['kategori']
            ]);
        }

        // Simpan diskusi dengan kategori yang ditemukan atau baru
        $diskusi = new Diskusi();
        $diskusi->uid = $validatedData['user_uid'];
        $diskusi->judul = $validatedData['judul'];
        $diskusi->isi_diskusi = $validatedData['isi_diskusi'];
        $diskusi->id_kategori = $kategori->id_kategori; // Gunakan id kategori yang ditemukan/baru

        if ($diskusi->save()) {
            return response()->json(['success' => true, 'message' => 'Diskusi berhasil disimpan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan ke database']);
        }
    }

    public function index()
    {
        // Mengambil data diskusi dari database
        $diskusis = Diskusi::with('kategori')->get(); // Include kategori jika ada relasi

        // Mengirim data ke view 'home.home'
        return view('home.home', compact('diskusis'));
    }

    public function show($id_diskusi)
    {
        $diskusi = Diskusi::with('kategori')->where('id_diskusi', $id_diskusi)->firstOrFail();
        return view('comment_discussion.comment', compact('diskusi'));
    }
}
