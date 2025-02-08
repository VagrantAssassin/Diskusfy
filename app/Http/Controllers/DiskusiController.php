<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Diskusi; // Pastikan model Diskusi sudah ada
use App\Models\Kategori;

class DiskusiController extends Controller
{
    public function add(Request $request)
    {
        // Ubah validasi: menerima judul, isi diskusi, nama kategori, dan user_uid
        $validatedData = $request->validate([
            'judul'       => 'required|string|max:255',
            'isi_diskusi' => 'required|string',
            'kategori'    => 'required|string|max:255',
            'user_uid'    => 'required|string'
        ]);

        DB::beginTransaction();
        try {
            // Ambil nama kategori yang diinput user
            $categoryName = $validatedData['kategori'];

            // Cari kategori berdasarkan nama; jika belum ada, buat kategori baru.
            // Catatan: Jika kolom id_kategori sudah auto-increment, parameter kedua tidak diperlukan.
            $kategori = Kategori::firstOrCreate(
                ['nama_kategori' => $categoryName],
                ['id_kategori'   => Kategori::max('id_kategori') + 1] // Hanya diperlukan jika tidak auto-increment
            );
            $kategoriId = $kategori->id_kategori;

            // Simpan diskusi ke database dengan kategori yang sesuai
            $diskusi = Diskusi::create([
                'judul'       => $validatedData['judul'],
                'isi_diskusi' => $validatedData['isi_diskusi'],
                'id_kategori' => $kategoriId,
                'uid'         => $validatedData['user_uid'],
            ]);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan ke database: ' . $e->getMessage()
            ]);
        }
    }

    public function index()
    {
        // Mengambil seluruh data diskusi (bisa menggunakan pagination jika data sangat banyak)
        $diskusis = Diskusi::all();

        return view('home.home', compact('diskusis'));
    }

    public function show($id_diskusi)
    {
        // Mengambil diskusi beserta komentar (relasi "balasans")
        $diskusi = Diskusi::with('balasans')->where('id_diskusi', $id_diskusi)->firstOrFail();
        return view('comment_discussion.comment', compact('diskusi'));
    }
}
