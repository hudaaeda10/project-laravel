<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Alert;

class OtentikasiController extends Controller
{
    public function index()
    {
        return view('otentikasi.login');
    }

    public function login(Request $request)
    {
        // $user = User::where('email', $request->email)->firstOrFail();
        // if ($user) {
        //     if (Hash::check($request->password, $user->password)) {
        //         session(['berhasil_login' => true]);
        //         return redirect('/dashboard');
        //     }
        // }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::success('Login', 'Anda Berhasil Login');
            return redirect('/dashboard');
        }
        return redirect('/')->with('message', 'Email atau Password anda salah');
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        Auth::logout();
        return redirect('/')->with('message', 'Anda telah logout');
    }
}
