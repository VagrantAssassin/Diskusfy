<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori; // Pastikan model Kategori sudah ada

class CategoryAdmin extends Controller
{
    // Mengembalikan seluruh data kategori sebagai JSON
    public function index()
    {
        $categories = Kategori::all();
        return response()->json($categories);
    }

    // Mengembalikan satu kategori berdasarkan id (untuk form edit)
    public function edit($id)
    {
        $category = Kategori::findOrFail($id);
        return response()->json($category);
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $category = Kategori::findOrFail($id);
        // Pastikan field 'nama_kategori' termasuk dalam mass assignment (fillable)
        $category->update($request->only(['nama_kategori']));
        return response()->json(['message' => 'Category updated successfully']);
    }

    // Menghapus data kategori
    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        // Membuat data kategori baru
        $category = Kategori::create($data);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category
        ]);
    }

}
