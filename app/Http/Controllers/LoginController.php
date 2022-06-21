<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 로그인 페이지
    public function index()
    {
        return view('auth.login');
    }

    // 로그인 처리
    public function authenticate(Request $request)
    {
        $credentials                                      = $request->only('email', 'password');

        // 로그인 확인
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'message'                                     => '메일주소 또는 비밀번호가 올바르지 않습니다.'
        ]);
    }

    // 로그아웃
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}