<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balasan;

class ReplyAdminController extends Controller
{
    public function index()
    {
        $replies = Balasan::all();
        return response()->json($replies);
    }

    public function edit($id)
    {
        $reply = Balasan::findOrFail($id);
        return response()->json($reply);
    }

    public function update(Request $request, $id)
    {
        $reply = Balasan::findOrFail($id);
        $reply->update($request->only(['parent_id', 'id_diskusi', 'uid', 'isi_balasan']));
        return response()->json(['message' => 'Reply updated successfully']);
    }

    public function destroy($id)
    {
        $reply = Balasan::findOrFail($id);
        $reply->delete();
        return response()->json(['message' => 'Reply deleted successfully']);
    }
}
