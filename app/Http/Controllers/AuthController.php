<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
         ]);
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        ]);
        Auth::login($users);
        return redirect()->route('login');
    }
    public function sing(Request $request)
    {
        $true = $request->only('email','password');
        $remember = $request->has('remember');
        if (Auth::attempt($true,$remember))
        {
            if (Auth::attempt($true, $remember)) {
                $user = Auth::user();
                if ($user->role_id == 1) {
                    return redirect()->route('admin');
                }
                if ($user->role_id == 2) {
                    return redirect()->route('superAdmin');
                }
                return redirect()->route('profiles');
            }
        }
        else
        {
            return back();
        }
    }
}
