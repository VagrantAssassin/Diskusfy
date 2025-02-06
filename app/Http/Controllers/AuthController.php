<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class AuthController extends Controller
{
    // Tampilkan halaman login (GET request)
    public function loginPage()
    {
        return view('auth.login.login');
    }

    // Proses login dengan Google (POST request)
    public function login(Request $request)
    {
        // Validasi request dari frontend
        $request->validate([
            'email' => 'required|email',
            'uid' => 'required|string',
        ]);

        // Cek apakah user sudah ada
        $user = Pengguna::where('uid', $request->uid)->first();

        if (!$user) {
            // Jika user belum ada, buat user baru
            $user = new Pengguna();
            $user->uid = $request->uid;
            $user->username = explode('@', $request->email)[0]; // Gunakan bagian pertama dari email sebagai username
            $user->email = $request->email;
            $user->nama = $request->email; // Gunakan email sebagai nama sementara
            $user->save();
        }

        // Beri respon sukses dalam bentuk JSON
        return response()->json(['success' => true, 'message' => 'Login berhasil']);
    }
}


