<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Pastikan semua email dan password terisi dengan benar!');
            return redirect()->back();
        }

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $request->session()->regenerate();

            toast('Selamat datang admin!', 'success');

            return redirect()->route('admin.dashboard');
        }

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $request->session()->regenerate();

            toast('Selamat datang user!', 'success');

            return redirect()->route('user.dashboard');
        }

        Alert::error('Login Gagal!', 'Email atau password tidak valid!');

        return redirect()->back();
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan semua data terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'point' => 10000,
        ]);

        Alert::success('Berhasil', 'Akun baru berhasil dibuat, silahkan login.');

        return redirect()->route('index.home');
    }

    public function admin_logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Berhasil Logout!', 'success');

        return redirect()->route('index.home');
    }

    public function user_logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Berhasil Logout!', 'success');

        return redirect()->route('index.home');
    }
}
