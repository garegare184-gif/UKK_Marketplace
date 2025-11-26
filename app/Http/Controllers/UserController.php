<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST USER
    public function index()
    {
        $data = User::all();
        return view('admin.user.index', compact('data'));
    }

    // FORM TAMBAH USER
    public function create()
    {
        return view('admin.user.create');
    }

    // PROSES TAMBAH USER
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect('/admin/user')->with('success', 'User berhasil ditambahkan!');
    }

    // FORM EDIT USER
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // PROSES UPDATE USER
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);

        $data = [
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'role' => $request->role
        ];

        if ($request->password != '') {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/admin/user')->with('success', 'User berhasil diperbarui!');
    }

    // HAPUS USER
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/admin/user')->with('success', 'User berhasil dihapus!');
    }
    public function produk()
    {
        // ambil semua produk + pagination
        $product = Product::orderBy('id_produk', 'DESC')->paginate(8);

        return view('produk', compact('product'));
    }


public function detail($id)
{
    $product = Product::where('id_produk', $id)->first();

    if (!$product) {
        return redirect('/')->with('error', 'Produk tidak ditemukan');
    }

    $category = Category::all();

    return view('produk_detail', compact('product', 'category'));
}

public function kategori($id)
{
    $kategori = Category::findOrFail($id);
    $product = Product::where('id_kategori', $id)->get();
        
    return view('kategori', compact('kategori', 'product'));
}

}

