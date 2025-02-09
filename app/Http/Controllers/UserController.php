<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class UserController extends Controller
{
    public function index()
    {
        $users = Pengguna::all();
        return response()->json($users);
    }

    public function edit($id)
    {
        $user = Pengguna::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = Pengguna::findOrFail($id);
        $user->update($request->only(['username', 'email', 'nama']));
        return response()->json(['message' => 'User updated successfully']);
    }

    public function destroy($id)
    {
        $user = Pengguna::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

}
