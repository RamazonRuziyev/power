<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }
    public function admin_setting()
    {
        return view('admin.setting.edit');
    }
    public function admin_settingUpdate(User $user , Request $request)
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
                Storage::delete('public/avatar/' . $user->avatar);
            }
            $true = $request->file('image');
            $path = Storage::putFile('public/avatar',$true);
            $imageName = basename($path);
            $user->avatar = $imageName;
        }
        $user->update();
        return redirect()->route('admin');
    }
    public function notifications()
    {
        $petitions = Petition::where('status' ,'=',0)
            ->where('employee', auth()->user()->id)
            ->orderBy('id','desc')
            ->paginate(7);
        return view('admin.petition.view',compact('petitions'));
    }
    public function notification_accept(Petition $petition)
    {
       Petition::where('id','=',$petition->id)
           ->update([
                'status' => 1
            ]);
        return redirect()->route('admin');
    }
    public function notification_cancel(Petition $petition)
    {
        Petition::where('id', '=', $petition->id)
            ->update([
                'status' => 2
            ]);
        return redirect()->route('admin');
    }
    public function notificationShow(Petition $petition)
    {
        return view('admin.petition.show',compact('petition'));
    }
    public function petition_accept()
    {
        $count  = Petition::where('status' ,'=',1)
            ->where('employee', auth()->user()->id)
            ->count();
        $petitions = Petition::where('status','=',1)
            ->where('employee', auth()->user()->id)
            ->paginate(7);
        return view('admin.petition.petition_accept',compact('count','petitions'));
    }
    public function petition_cancel()
    {
        $count  = Petition::where('status' ,'=',2)
            ->where('employee', auth()->user()->id)
            ->count();
        $petitions = Petition::where('status','=',2)
            ->where('employee', auth()->user()->id)
            ->paginate(7);
        return view('admin.petition.petiton_cancel',compact('count','petitions'));
    }
}
