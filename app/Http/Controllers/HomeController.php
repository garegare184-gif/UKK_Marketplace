<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Category;

class HomeController extends Controller
{

public function index()
{
    $product = Product::latest()->take(8)->get();
    $category = Category::all();

    return view('beranda', compact('product', 'category'));
}

public function detailProduk($id)
{
    $product = Product::with('toko')->find($id);

    $category = Category::all();

    return view('produk.detail', compact('product', 'category'));
}
public function kategori($slug)
{
    $kategori = Category::where('slug', $slug)->first();

    if (!$kategori) {
        abort(404);
    }

    $produk = Product::where('id_kategori', $kategori->id_kategori)->get();

    return view('produk.kategori', [
        'kategori' => $kategori,
        'produk' => $produk
    ]);
}

public function listToko()
{
    $toko = Toko::with('pemilik')->get(); // jika ada relasi user

    return view('toko.index', compact('toko'));
}

public function beranda()
{
    $category = Category::all();
    $product = Product::orderBy('id_produk','DESC')->take(8)->get();

    return view('beranda', compact('category', 'product'));
}



}
