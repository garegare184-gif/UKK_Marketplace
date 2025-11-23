<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Username atau Password salah!');
        }

        // Simpan session manual
        session([
            'id_user' => $user->id,
            'nama' => $user->nama,
            'role' => $user->role
        ]);

        // Redirect sesuai role
        if ($user->role == 'admin') {
            return redirect('/admin/dasboard');
        } else {
            return redirect('/member/dasboard');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
    public function registerForm()
    {
        return view('register');
    }
    public function registerProcess(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:4',
        ]);
        
        \DB::table('users')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'member',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/login')->with('success', 'Register berhasil, silakan login');
    }
}
