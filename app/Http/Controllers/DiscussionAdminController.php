<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi;

class DiscussionAdminController extends Controller
{
    public function index()
    {
        $discussions = Diskusi::all();
        return response()->json($discussions);
    }
    public function edit($id)
    {
        $discussion = Diskusi::findOrFail($id);
        return response()->json($discussion);
    }
    public function update(Request $request, $id)
    {
        $discussion = Diskusi::findOrFail($id);
        $discussion->update($request->only(['id_kategori', 'uid', 'judul', 'isi_diskusi']));
        return response()->json(['message' => 'Discussion updated successfully']);
    }
    public function destroy($id)
    {
        $discussion = Diskusi::findOrFail($id);
        $discussion->delete();
        return response()->json(['message' => 'Discussion deleted successfully']);
    }
}
