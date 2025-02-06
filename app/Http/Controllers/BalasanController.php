<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balasan;

class BalasanController extends Controller
{
    public function store(Request $request, $id_diskusi)
    {
        $validatedData = $request->validate([
            'isi_balasan' => 'required|string',
            'user_uid' => 'required|string'
        ]);

        // Simpan balasan ke database
        $balasan = new Balasan();
        $balasan->id_diskusi = $id_diskusi; // Ambil dari parameter route
        $balasan->uid = $validatedData['user_uid']; // Pastikan pengguna login
        $balasan->isi_balasan = $validatedData['isi_balasan'];

        if ($balasan->save()) {
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan ke database']);
        }
    }
}
