<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balasan2;

class Balasan2Controller extends Controller
{
    /**
     * Simpan reply (balasan) ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_balasan
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $id_balasan)
    {
        $validatedData = $request->validate([
            'user_uid'      => 'required|string',
            'isi_balasan2'  => 'required|string'
        ]);

        $balasan2 = new Balasan2();
        $balasan2->id_balasan   = $id_balasan;
        $balasan2->uid          = $validatedData['user_uid'];
        $balasan2->isi_balasan2 = $validatedData['isi_balasan2'];

        if ($balasan2->save()) {
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan ke database']);
        }
    }
}
