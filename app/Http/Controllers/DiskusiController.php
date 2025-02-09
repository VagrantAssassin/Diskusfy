<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Diskusi;
use App\Models\Kategori;

class DiskusiController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_diskusi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'user_uid' => 'required|string'
        ]);

        DB::beginTransaction();
        try {
            $categoryName = $validatedData['kategori'];

            $kategori = Kategori::firstOrCreate(
                ['nama_kategori' => $categoryName],

                []
            );
            $kategoriId = $kategori->id_kategori;
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
        $diskusis = Diskusi::all();
        return view('home.home', compact('diskusis'));
    }

    public function show($id_diskusi)
    {
        $diskusi = Diskusi::with('balasans')->where('id_diskusi', $id_diskusi)->firstOrFail();
        return view('comment_discussion.comment', compact('diskusi'));
    }

    /**
     * 
     *
     * @param  int  $id_kategori
     * @return \Illuminate\View\View
     */
    public function filterByCategory($id_kategori)
    {

        $diskusis = Diskusi::where('id_kategori', $id_kategori)->get();

        $kategori = Kategori::findOrFail($id_kategori);

        return view('home.home', compact('diskusis', 'kategori'));
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $diskusis = Diskusi::where('judul', 'like', '%' . $query . '%')->get();

        return view('partials.discussion-list', compact('diskusis'));
    }
    public function popular()
    {

        $diskusis = Diskusi::withCount('balasans')
            ->orderBy('balasans_count', 'desc')
            ->get();

        $title = "Popular Discussions";
        return view('home.home', compact('diskusis', 'title'));
    }
}
