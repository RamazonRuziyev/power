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
 // register
    public function save(StoreRegisterRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);
            $save = new User();
            $save->name = $request->name;
            $save->email = $request->email;
            $save->password = Hash::make($request->password);
            $save->role_id = 3;
            $save->save();
            return redirect()->route('login');
    }
// login
    public function sing(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|'
        ]);
        $true = $request->only('email','password');
        $remember = $request->has('remember');
        if (Auth::attempt($true,$remember))
        {
            if ('123' == $request->password && Auth::check() && Auth::user()->role_id == 1)
            {
                return redirect()->route('admin');
            }
            elseif ('12345678' == $request->password && Auth::check() && Auth::user()->role_id == 2)
            {
                return  redirect()->route('superAdmin');
            }
            else{
                return redirect()->route('profiles');
            }
        }
        else
        {
            return with('xato');
        }
    }
}
