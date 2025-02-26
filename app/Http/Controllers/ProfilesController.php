<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    public function profiles()
    {
        return view('profiles.index');
    }
    public function setting()
    {
        return view('profiles.setting.view');
    }
    public function update_setting(Request $request , User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'old_password' => ['required',function($attribute ,$value ,$fail)
            {
                if (!Hash::check($value,Auth::user()->password))
                {
                    return $fail('old password xato')  ;
                }
            }],
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($request->hasFile('image'))
        {
            if ($user->avatar) {
                // Eski rasmni o'chirish
                Storage::delete('public/avatar/' . $user->avatar);
            }
            $true = $request->file('image');
            $path = Storage::putFile('public/avatar',$true);
            $imageName = basename($path);
            $user->avatar = $imageName;
        }
        $user->update();
        return redirect()->route('profiles');
    }
}
