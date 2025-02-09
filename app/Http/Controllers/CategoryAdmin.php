<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class CategoryAdmin extends Controller
{
    public function index()
    {
        $categories = Kategori::all();
        return response()->json($categories);
    }
    public function edit($id)
    {
        $category = Kategori::findOrFail($id);
        return response()->json($category);
    }
    public function update(Request $request, $id)
    {
        $category = Kategori::findOrFail($id);
        $category->update($request->only(['nama_kategori']));
        return response()->json(['message' => 'Category updated successfully']);
    }
    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);
        $category = Kategori::create($data);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category
        ]);
    }

}
