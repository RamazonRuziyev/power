<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin()
    {
        return view('admin.index');
    }

    public function notifications()
    {
        $petitions = Petition::where('status' ,'=',0)
            ->where('employee', auth()->user()->id)
            ->orderBy('id','desc')
            ->paginate(7);
//        dd($petitions);
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
