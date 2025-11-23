<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Toko;

class ProdukController extends Controller
{
    public function index()
    {
        // Ambil toko milik member
        $toko = Toko::where('id_user', session('id_user'))->first();

        // Jika belum punya toko
        if(!$toko){
            return redirect('/member/toko')->with('error', 'Buat toko dulu sebelum menambahkan produk.');
        }

        // Ambil produk berdasarkan toko
        $produk = Product::where('id_toko', $toko->id)->get();

        return view('member.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Category::all();
        return view('member.produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'id_kategori' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Ambil id toko member
        $toko = Toko::where('id_user', session('id_user'))->first();

        // Upload gambar
        $fileName = null;
        if($request->hasFile('gambar')){
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
        }

        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fileName,
            'id_toko' => $toko->id   // otomatis milik member
        ]);

        return redirect('/member/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Product::findOrFail($id);
        $kategori = Category::all();

        return view('member.produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'id_kategori' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if($request->hasFile('gambar')){
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $produk->gambar = $fileName;
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->id_kategori = $request->id_kategori;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();

        return redirect('/member/produk')->with('success', 'Produk berhasil diupdate');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect('/member/produk')->with('success', 'Produk berhasil dihapus');
    }
}
