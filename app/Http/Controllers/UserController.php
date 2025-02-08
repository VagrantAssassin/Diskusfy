<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class UserController extends Controller
{
    // Mengambil seluruh data pengguna
    public function index()
    {
        $users = Pengguna::all();
        return response()->json($users);
    }


    // Mengambil satu data pengguna untuk diedit
    public function edit($id)
    {
        $user = Pengguna::findOrFail($id);
        return response()->json($user);
    }

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
        $user = Pengguna::findOrFail($id);
        // Pastikan field-field yang di-update diizinkan dalam mass assignment
        $user->update($request->only(['username', 'email', 'nama']));
        return response()->json(['message' => 'User updated successfully']);
    }

    // Menghapus data pengguna
    public function destroy($id)
    {
        $user = Pengguna::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
