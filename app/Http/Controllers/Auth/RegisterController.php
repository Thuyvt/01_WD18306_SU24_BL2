<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        // hiển thị view register
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // xử lý logic chức năng đăng ky
//        dd($request->all());
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::query()->create($data);
        //Log in với user vuwaf tao
        Auth::login($user);

        // Cấp lại session cho user mới đăng nhập
        $request->session()->regenerate();

        return redirect()->intended('/');
    }
}
