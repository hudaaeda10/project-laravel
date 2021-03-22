<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OtentikasiController extends Controller
{
    public function index()
    {
        return view('otentikasi.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                session(['berhasil_login' => true]);
                return redirect('/dashboard');
            }
        }
        return redirect('/')->with('message', 'Email atau Password anda salah');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('message', 'Anda telah logout');
    }
}
