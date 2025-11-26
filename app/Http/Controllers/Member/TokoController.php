<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;

class TokoController extends Controller
{
    // Toko Saya
    public function index()
    {
        $toko = Toko::where('id_user', session('id_user'))->first(); // mengambil data prtaama
        return view('member.toko.index', compact('toko'));
    }

    // Form Tambah Toko
    public function create()
    {
        $cek = Toko::where('id_user', session('id_user'))->first();
        if($cek){
            return redirect('/member/toko')->with('error', 'Anda sudah memiliki toko!');
        }
        return view('member.toko.create');
    }

    // Simpan Toko
    public function store(Request $request)
    {
        $cek = Toko::where('id_user', session('id_user'))->first();
        if($cek){
            return redirect('/member/toko')->with('error', 'Toko sudah terdaftar');
        }

        $namaFile = null;
        if($request->hasFile('gambar')){
            $namaFile = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('toko'), $namaFile);
        }

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'gambar' => $namaFile,
            'id_user' => session('id_user')
        ]);

        return redirect('/member/toko')->with('success', 'Toko berhasil dibuat!');
    }

    // Form Edit Toko
    public function edit($id)
    {
        $toko = Toko::where('id_toko', $id)
                    ->where('id_user', session('id_user'))
                    ->first();
        if(!$toko){
            return redirect('/member/toko')->with('error', 'Toko tidak ditemukan');
        }
        return view('member.toko.edit', compact('toko'));
    }

    // Update Toko
    public function update(Request $request, $id)
    {
        $toko = Toko::where('id_toko', $id)
                    ->where('id_user', session('id_user'))
                    ->first();

        if(!$toko){
            return redirect('/member/toko')->with('error', 'Toko tidak ditemukan');
        }

        $namaFile = $toko->gambar;
        if($request->hasFile('gambar')){
            $namaFile = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('toko'), $namaFile);
        }

        $toko->update([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'gambar' => $namaFile
        ]);

        return redirect('/member/toko')->with('success', 'Toko berhasil diupdate!');
    }

    // Hapus Toko
    public function delete($id)
    {
        $toko = Toko::where('id_toko', $id)
                    ->where('id_user', session('id_user'))
                    ->first();

        if(!$toko){
            return redirect('/member/toko')->with('error', 'Toko tidak ditemukan');
        }

        // Hapus gambar jika ada
        if($toko->gambar && file_exists(public_path('toko/'.$toko->gambar))){
            unlink(public_path('toko/'.$toko->gambar));
        }

        // Hapus toko
        $toko->delete();

        return redirect('/member/toko')->with('success', 'Toko berhasil dihapus!');
    }
}
