<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // 회원가입 페이지
    public function create()
    {
        return view('regist.register');
    }

    // 회원가입 완료
    public function store(Request $request)
    {
        $request->validate([
            'name'                                          => 'required|string|max:255',
            'email'                                         => 'required|string|email|max:255|unique:users',
            'password'                                      => 'required|string|confirmed|min:8'
        ]);

        $user                                               = User::create([
            'name'                                          => $request->name,
            'email'                                         => $request->email,
            'password'                                      => Hash::make($request->password)
        ]);
        event(new Registered($user));

        return view('regist.complete', compact('user'));
    }
}