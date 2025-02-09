<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'uid' => 'required|string',
        ]);
        $user = Pengguna::where('uid', $request->uid)->first();

        if (!$user) {
            $user = new Pengguna();
            $user->uid = $request->uid;
            $user->username = explode('@', $request->email)[0];
            $user->email = $request->email;
            $user->nama = $request->email;
            $user->save();
        }
        return response()->json(['success' => true, 'message' => 'Login berhasil']);
    }
}


