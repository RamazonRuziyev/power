<?php

namespace App\Http\Controllers;

use App\Events\PetitionEvent;
use App\Http\Requests\StorePetitionRequest;
use App\Models\Petition;
use App\Models\User;
use App\Notifications\PetitionCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class PetitonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petitions = Petition::query()
            ->join('users', 'petitions.employee', '=', 'users.id')
            ->select('petitions.*', 'users.name as employee_name')
            ->orderByDesc('id')
            ->paginate(7);
        return view('profiles.petition.view',compact('petitions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role_id','=',1)->get();
        return view('profiles.petition.create',compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetitionRequest $request)
    {
        try {
            $petition = new  Petition();
            $petition->fio = $request->name;
            $petition->mfy = $request->mfy;
            $petition->village = $request->village;
            $petition->phone = $request->phone;
            $petition->description = $request->desc;
            $petition->employee = $request->employee;
            $petition->status = 0;
            $petition->save();
            $employee = User::find($request->employee);
            if ($employee) {
                $employee->notify(new PetitionCreatedNotification($petition));
            } else {
                return redirect()->back()->with('error', 'Foydalanuvchi topilmadi.');
            }
            event(new PetitionEvent($petition)); // Petition ma'lumotini yuborish
            Alert::success('Muvaffaqiyat', 'Petitsiya muvaffaqiyatli yaratildi');
            return  redirect()->back();
        }
        catch (\Exception $exception)
        {
            return redirect()
                ->back()
                ->with('error', 'Ma\'lumotlarni saqlashda xatolik yuz berdi.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Petition $petition)
    {
//        return view('profiles.petition.show',compact('petition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petition $petition)
    {
        return view('profiles.petition.edit',compact('petition'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petition $petition)
    {
        try {
            $petition->fio = $request->name;
            $petition->mfy = $request->mfy;
            $petition->village = $request->village;
            $petition->phone = $request->phone;
            $petition->description = $request->desc;
            $petition->employee = $request->employee;
            $petition->update();
        }
    catch (\Exception $exception)
        {
            return redirect()
                ->back()
                ->with('error', 'Ma\'lumotlarni tahrirlashda xatolik yuz berdi.');
        }
        return  redirect()->route('petition.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function petition_notification()
    {
        $petition = Petition::where('status', '=', 0)->count();
        return response()->json([
            'status' => true,
            'petition' => $petition,
        ]);
    }
}
