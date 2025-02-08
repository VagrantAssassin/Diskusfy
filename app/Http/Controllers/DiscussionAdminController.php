<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi; // Pastikan model Diskusi sudah ada dan dikonfigurasi (primaryKey, fillable, dll)

class DiscussionAdminController extends Controller
{
    // Mengembalikan seluruh data diskusi sebagai JSON
    public function index()
    {
        $discussions = Diskusi::all();
        return response()->json($discussions);
    }

    // Mengembalikan satu data diskusi berdasarkan id (untuk form edit)
    public function edit($id)
    {
        $discussion = Diskusi::findOrFail($id);
        return response()->json($discussion);
    }

    // Memperbarui data diskusi
    public function update(Request $request, $id)
    {
        $discussion = Diskusi::findOrFail($id);
        // Pastikan field yang di‑update termasuk ke dalam mass assignment
        $discussion->update($request->only(['id_kategori', 'uid', 'judul', 'isi_diskusi']));
        return response()->json(['message' => 'Discussion updated successfully']);
    }

    // Menghapus data diskusi
    public function destroy($id)
    {
        $discussion = Diskusi::findOrFail($id);
        $discussion->delete();
        return response()->json(['message' => 'Discussion deleted successfully']);
    }
}
