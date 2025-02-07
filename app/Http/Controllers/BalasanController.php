<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balasan;

class BalasanController extends Controller
{
    /**
     * Simpan komentar (balasan) ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_diskusi
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $id_diskusi)
    {
        $validatedData = $request->validate([
            'isi_balasan' => 'required|string',
            'user_uid' => 'required|string'
        ]);

        // Simpan balasan ke database
        $balasan = new Balasan();
        $balasan->id_diskusi = $id_diskusi; // Ambil dari parameter route
        $balasan->uid = $validatedData['user_uid'];
        $balasan->isi_balasan = $validatedData['isi_balasan'];

        if ($balasan->save()) {
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan ke database']);
        }
    }

    /**
     * Hapus komentar (balasan) berdasarkan id.
     *
     * @param  int  $id_balasan
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id_balasan, Request $request)
    {
        // Cari komentar berdasarkan id_balasan
        $balasan = Balasan::find($id_balasan);

        if (!$balasan) {
            return response()->json(['success' => false, 'message' => 'Komentar tidak ditemukan'], 404);
        }

        // (Optional) Jika Anda ingin memastikan bahwa hanya pemilik komentar yang dapat menghapus, 
        // Anda bisa mengambil uid dari request (misalnya via query atau body) dan membandingkannya.
        // Contoh:
        // $userUid = $request->input('user_uid');
        // if ($userUid && $userUid !== $balasan->uid) {
        //     return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        // }

        // Hapus komentar
        $balasan->delete();

        return response()->json(['success' => true, 'message' => 'Komentar berhasil dihapus']);
    }
}
