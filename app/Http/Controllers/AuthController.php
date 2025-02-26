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
            'password' => 'required'
        ]);
//        dd($request->all());
            $save = new User();
            $save->name = $request->name;
            $save->email = $request->email;
            $save->password = Hash::make($request->password);
            $save->save();
            return redirect()->route('login');


    }
// login
    public function sing(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $true = $request->only('email','password');
        $result = $request->result;
        if (Auth::attempt($true,$result))
        {
            if ('123' == $request->password && Auth::check() && Auth::user()->role == 'adm')
            {
                return redirect()->route('admin');
            }
            elseif ('12345678' == $request->password && Auth::check() && Auth::user()->role == 'super')
            {
                return  redirect()->route('superAdmin');
            }
            else{
                return redirect()->route('profiles');
            }
        }
        else
        {
            return back();
        }
    }
}
