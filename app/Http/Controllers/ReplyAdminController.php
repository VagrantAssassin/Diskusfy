<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balasan; // Pastikan model Balasan sudah ada

class ReplyAdminController extends Controller
{
    // Mengembalikan seluruh data balasan sebagai JSON
    public function index()
    {
        $replies = Balasan::all();
        return response()->json($replies);
    }

    // Mengembalikan satu data balasan berdasarkan id (untuk form edit)
    public function edit($id)
    {
        $reply = Balasan::findOrFail($id);
        return response()->json($reply);
    }

    // Memperbarui data balasan
    public function update(Request $request, $id)
    {
        $reply = Balasan::findOrFail($id);
        // Pastikan field yang di‑update termasuk dalam mass assignment
        $reply->update($request->only(['parent_id', 'id_diskusi', 'uid', 'isi_balasan']));
        return response()->json(['message' => 'Reply updated successfully']);
    }

    // Menghapus data balasan
    public function destroy($id)
    {
        $reply = Balasan::findOrFail($id);
        $reply->delete();
        return response()->json(['message' => 'Reply deleted successfully']);
    }
}
