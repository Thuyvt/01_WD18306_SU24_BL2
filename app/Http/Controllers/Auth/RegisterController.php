<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        // xác thực tài khoản
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($token, $user->name));

        return redirect()->intended('/');
    }
}
