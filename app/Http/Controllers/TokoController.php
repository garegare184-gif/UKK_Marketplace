<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $data = Toko::with('pemilik')->get();
        return view('admin.toko.index', compact('data'));
    }

    public function create()
    {
        $users = User::where('role', 'member')->get();
        return view('admin.toko.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'kontak_toko' => 'required',
            'id_user' => 'required|unique:toko,id_user',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $namaGambar = null;
        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('toko'), $namaGambar);
        }

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'id_user' => $request->id_user,
            'gambar' => $namaGambar
        ]);

        return redirect('/admin/toko')->with('success', 'Toko berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        $users = User::where('role', 'member')->get();
        return view('admin.toko.edit', compact('toko', 'users'));
    }

    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);

        $request->validate([
            'nama_toko' => 'required',
            'kontak_toko' => 'required',
            'id_user' => 'required|unique:toko,id_user,' . $id,
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $namaGambar = $toko->gambar;
        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('toko'), $namaGambar);
        }

        $toko->update([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'id_user' => $request->id_user,
            'gambar' => $namaGambar
        ]);

        return redirect('/admin/toko')->with('success', 'Toko berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Toko::destroy($id);
        return redirect('/admin/toko')->with('success', 'Toko berhasil dihapus!');
    }
}
