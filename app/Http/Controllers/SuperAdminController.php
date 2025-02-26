<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\select;

class SuperAdminController extends Controller
{
    public function superAdmin()
    {
        return view('SuperAdmin.index');
    }

    public function index()
    {
        $users = User::query()->where('role','!=','super')
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
            ->where('users.role', '=', 'adm')
            ->select('petitions.*', 'users.name as employee_name')
            ->orderByDesc('petitions.id')
            ->paginate(3);

        $employees = DB::table('users')
            ->where('role', '=', 'adm')
            ->get(); // Get all employees with role 'adm'

        return view('SuperAdmin.xodim.index', compact('petitions', 'employees'));
    }
}
