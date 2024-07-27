<?php

namespace App\Http\Controllers\Auth\backup;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        // Hien thi form login
        return view('auth.login');
    }

    public function login(Request $request) {
        // Xử lý logic login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout() {
        // Xử lý logic logout
        Auth::logout();
        \request()->session()->invalidate();
        return redirect('/');
    }

    public function verify($token)
    {
        $user = User::query()
            ->where('email_verified_at', null)
            ->where('email', base64_decode($token))->first();
        if ($user) {
            $user->update(['email_verified_at' => Carbon::now()->toDateTimeString()]);
            return redirect()->route('welcome');
        }
    }
}
