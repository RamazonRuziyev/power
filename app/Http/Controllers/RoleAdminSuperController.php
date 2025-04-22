<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

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
}
