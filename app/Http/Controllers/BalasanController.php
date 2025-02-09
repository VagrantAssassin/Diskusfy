<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balasan;

class BalasanController extends Controller
{
    /**
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

        $balasan = new Balasan();
        $balasan->id_diskusi = $id_diskusi;
        $balasan->uid = $validatedData['user_uid'];
        $balasan->isi_balasan = $validatedData['isi_balasan'];

        if ($balasan->save()) {
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan ke database']);
        }
    }

    /**
     *
     * @param  int  $id_balasan
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id_balasan, Request $request)
    {
        $balasan = Balasan::find($id_balasan);

        if (!$balasan) {
            return response()->json(['success' => false, 'message' => 'Komentar tidak ditemukan'], 404);
        }

        $balasan->delete();

        return response()->json(['success' => true, 'message' => 'Komentar berhasil dihapus']);
    }
}
