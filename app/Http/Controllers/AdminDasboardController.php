<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Toko;

class AdminDasboardController extends Controller
{
    public function index()
    {
        return view('admin.dasboard', [
            'totalUser'     => User::count(),
            'totalCategory' => Category::count(),
            'totalProduct'   => Product::count(),
            'totalToko'     => Toko::count(),
        ]);
    }
}
