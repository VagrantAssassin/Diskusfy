<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show($uid)
    {
        $user = Pengguna::find($uid);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uid' => 'required|exists:penggunas,uid',
            'username' => 'required|max:32',
            'email' => 'required|email|max:50',
            'nama' => 'required|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Pengguna::find($request->uid);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui'
        ]);
    }
}
