<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\select;

class SuperAdminController extends Controller
{
    public function superAdmin()
    {
        return view('SuperAdmin.index');
    }
    public function index()
    {
        $users = User::query()->where('role_id','!=',2)
        ->orderByDesc('id')
        ->paginate(3);
        return view('SuperAdmin.user.index',compact('users'));
    }
    public function edit(User $user)
    {
        return view('SuperAdmin.user.edit',compact('user'));
    }
    public function update(Request $request , User $user)
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
        $user->update();
        return redirect()->route('user.view');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.view');
    }
    public function user_all()
    {
        $petitions = DB::table('petitions')
            ->join('users', 'petitions.employee', '=', 'users.id')
            ->where('users.role_id', '=', 1)
            ->select('petitions.*', 'users.name as employee_name')
            ->orderByDesc('petitions.id')
            ->paginate(3);
        $employees = DB::table('users')
            ->where('role_id', '=', 1)
            ->paginate(3); // Get all employees with role 'adm'

        return view('SuperAdmin.xodim.index', compact('petitions', 'employees'));
    }
    public function user_adm()
    {
        $petitions = DB::table('petitions')
            ->join('users', 'petitions.employee', '=', 'users.id')
            ->where('users.role_id', '=', 1)
            ->select('petitions.*', 'users.name as employee_name')
            ->orderByDesc('petitions.id')
            ->paginate(5);
            return view('SuperAdmin.xodim.adm',compact('petitions'));
    }
    public function user_show($petition)
   {
        $petitions = DB::table('petitions')
            ->join('users', 'petitions.employee', '=', 'users.id')
            ->where('users.role_id', '=', 1)
            ->where('users.id','=',$petition)
            ->where('status','!=',0)
            ->select('petitions.*', 'users.name as employee_name')
            ->orderByDesc('petitions.id')
            ->paginate(10);
        return view('SuperAdmin.xodim.show',compact('petitions'));

    }
    public function setting_super()
    {
        return view('SuperAdmin.setting.edit');
    }
    public function update_settingSuper(Request $request,User $user)
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
        return redirect()->route('superAdmin');

    }
}
