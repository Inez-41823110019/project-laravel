<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Kalau sudah login, langsung ke dashboard
        if (session()->has('user_id')) {
         return redirect()->route('dashboard')
                 ->with('success', 'Login berhasil!');

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            session([
                'user_id'   => $user->id,
                'user_name' => $user->name,
            ]);

            return redirect()
                ->route('dashboard')
                ->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()
            ->route('login.form')
            ->with('success', 'Berhasil logout.');
    }
}
