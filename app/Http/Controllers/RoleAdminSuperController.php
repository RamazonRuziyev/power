<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class RoleAdminSuperController extends Controller
{
    public function role_index()
    {
        $roles = Role::all();
        return view('SuperAdmin.Role.index',compact('roles'));
    }
    public function role_create()
    {
        return view('SuperAdmin.Role.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
        ]);
        try {
            $role = new Role();
            $role->name = $request['name'];
            $role->save();
            return  redirect()->route('superAdmin');
        }
        catch (\Exception $exception)
        {
            return redirect()
                ->back()
                ->with('error', 'Ma\'lumotlarni saqlashda xatolik yuz berdi.');
        }
    }
    public function role_destroy(Role $role)
    {
        $role->delete();
        return redirect()->back();
    }
    public function role_edit(Role $role)
    {
        return view('SuperAdmin.Role.edit',compact('role'));
    }
    public function roles_update(Role $role , UpdateRoleRequest $request)
    {
        $request->validate([
            'name'=> 'required|string',
        ]);
        try {
            $role->name = $request['name'];
            $role->update();
            return  redirect()->route('role');
        }
        catch (\Exception $exception)
        {
            return redirect()
                ->back()
                ->with('error', 'Ma\'lumotlarni Tahrirlashda xatolik yuz berdi.');
        }
    }
    public function user_role()
    {
        $users = User::query()
            ->select('users.*','roles.name as role_name')
            ->join('roles','users.role_id' ,'=','roles.id' )
            ->orderByDesc('id')
            ->paginate(3);
        return view('SuperAdmin.Role.role_user',compact('users'));
    }
    public function user_roleEdit(User $user)
    {
        return view('SuperAdmin.Role.role_userEdit',compact('user'));
    }

    public function user_roleUpdate(User $user, Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
        ]);
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->update();
            return  redirect()->route('user.role');
        }
        catch (ValidationException $validationException)
        {
            return redirect()
                ->back()
                ->with('error', 'Ma\'lumotlarni saqlashda xatolik yuz berdi.');
        }

    }
}
