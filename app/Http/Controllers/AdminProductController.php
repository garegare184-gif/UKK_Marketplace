<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Toko;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('kategori', 'toko')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $kategori = Category::all(); //mengammbil semua
        $toko = Toko::all();
        return view('admin.product.create', compact('kategori','toko'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'id_kategori' => 'required',
            'id_toko' => 'required',
            'gambar' => 'image'
        ]);

        // Upload gambar
        $fileName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
        }

        Product::create([
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => now()->toDateString(),
            'gambar' => $fileName
        ]);

        return redirect('/admin/products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id_produk)
    {
        $product = Product::findOrFail($id_produk);
        $kategori = Category::all();
        $toko = Toko::all();

        return view('admin.product.edit', compact('product','kategori','toko'));
    }

    public function update(Request $request, $id_produk)
    {
        $product = Product::findOrFail($id_produk);

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'id_kategori' => 'required',
            'id_toko' => 'required',
        ]);

        // Upload gambar baru (opsional)
        $fileName = $product->gambar;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
        }

        $product->update([
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fileName
        ]);

        return redirect('/admin/products')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id_produk)
    {
        Product::destroy($id_produk);
        return back()->with('success', 'Produk berhasil dihapus');
    }
    // public function detail($id)
    // {
    //     $product = Product::with('toko')->findOrFail($id);
    //     return view('produk.detail', compact('product'));
    // }
}

