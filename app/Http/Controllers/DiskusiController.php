<?php

// app/Http/Controllers/DiskusiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Diskusi;
use App\Models\Kategori;

class DiskusiController extends Controller
{
    public function add(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_diskusi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'user_uid' => 'required|string'
        ]);

        DB::beginTransaction();
        try {
            $categoryName = $validatedData['kategori'];

            // Cari kategori berdasarkan nama, atau buat baru jika belum ada.
            $kategori = Kategori::firstOrCreate(
                ['nama_kategori' => $categoryName],
                // Jika kolom id_kategori bersifat auto-increment, Anda tidak perlu menyet nilai id secara manual.
                // Jika tidak, Anda dapat mengatur id seperti berikut:
                // ['id_kategori' => Kategori::max('id_kategori') + 1]
                []
            );
            $kategoriId = $kategori->id_kategori;

            // Simpan diskusi
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
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan ke database: ' . $e->getMessage()
            ]);
        }
    }

    public function index()
    {
        // Ambil seluruh diskusi
        $diskusis = Diskusi::all();
        return view('home.home', compact('diskusis'));
    }

    public function show($id_diskusi)
    {
        // Ambil diskusi beserta komentar (relasi "balasans")
        $diskusi = Diskusi::with('balasans')->where('id_diskusi', $id_diskusi)->firstOrFail();
        return view('comment_discussion.comment', compact('diskusi'));
    }

    /**
     * Tampilkan diskusi berdasarkan kategori yang dipilih.
     *
     * @param  int  $id_kategori
     * @return \Illuminate\View\View
     */
    public function filterByCategory($id_kategori)
    {
        // Ambil diskusi yang memiliki id_kategori sesuai parameter
        $diskusis = Diskusi::where('id_kategori', $id_kategori)->get();

        // Jika ingin menampilkan nama kategori di header, Anda bisa mengambil data kategori
        $kategori = Kategori::findOrFail($id_kategori);

        return view('home.home', compact('diskusis', 'kategori'));
    }

    // Method pencarian diskusi berdasarkan judul
    public function search(Request $request)
    {
        $query = $request->query('query'); // Ambil query dari URL
        $diskusis = Diskusi::where('judul', 'like', '%' . $query . '%')->get();

        // Kembalikan view partial yang berisi daftar diskusi hasil pencarian
        // Pastikan file view 'partials.discussion-list' sudah dibuat (lihat langkah berikutnya)
        return view('partials.discussion-list', compact('diskusis'));
    }
}
