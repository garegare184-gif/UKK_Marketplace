<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Toko;

class DasboardController extends Controller
{
    public function index()
    {
        // Ambil toko milik user login
        $toko = Toko::where('id_user', session('id_user'))->first();

        // Jika user belum punya toko percabangan
        if (!$toko) {
            $totalProduct = 0;
        } else {
            // Hitung produk hanya milik tokonya sendiri
            $totalProduct = Product::where('id_toko', $toko->id)->count();
        }

        return view('member.dasboard', compact('totalProduct', 'toko'));
    }
}
