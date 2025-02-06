<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Diskusi; // Pastikan model Diskusi ada
use App\Models\Kategori;

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

        DB::beginTransaction();
        try {
            $kategoriId = $validatedData['id_kategori'];

            // Jika user mengisi kategori baru, cek apakah sudah ada di database
            if ($request->filled('kategori_baru')) {
                $kategori = Kategori::firstOrCreate(
                    ['nama_kategori' => $request->kategori_baru],
                    ['id_kategori' => Kategori::max('id_kategori') + 1]
                );
                $kategoriId = $kategori->id_kategori;
            }

            // Simpan diskusi ke database
            $diskusi = Diskusi::create([
                'judul' => $validatedData['judul'],
                'isi_diskusi' => $validatedData['isi_diskusi'],
                'id_kategori' => $kategoriId,
                'uid' => $validatedData['user_uid'],
            ]);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan ke database: ' . $e->getMessage()]);
        }
    }

    public function index()
    {
        // Mengambil data diskusi dari database
        $diskusis = Diskusi::all(); // Bisa menggunakan pagination jika data banyak

        // Mengirim data ke view 'home.home'
        return view('home.home', compact('diskusis'));
    }

    public function show($id_diskusi)
    {
        $diskusi = Diskusi::where('id_diskusi', $id_diskusi)->firstOrFail();
        return view('comment_discussion.comment', compact('diskusi'));
    }
}
