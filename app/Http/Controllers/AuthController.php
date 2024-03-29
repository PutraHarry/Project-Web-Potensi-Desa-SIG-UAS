<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new Admin();
        $user->nama ->request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return 'sukses';
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::guard()->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('message', 'Email atau Password Anda Salah');
        }
    }

    public function logout()
    {
        Auth::guard()->logout();

        return redirect()->route('landing');
    }
}
