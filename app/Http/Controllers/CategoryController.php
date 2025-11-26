<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();//mengmbil semua data
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.kategori.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $cat = Category::findOrFail($id);
        $cat->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}

