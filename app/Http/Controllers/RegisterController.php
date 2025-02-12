<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class RegisterController extends Controller
{
    public function add(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'uid' => 'required|unique:penggunas',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:penggunas',
            'nama' => 'required|string|max:255',
        ]);

        $pengguna = new Pengguna();
        $pengguna->uid = $request->uid;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->nama = $request->nama;

        if ($pengguna->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
