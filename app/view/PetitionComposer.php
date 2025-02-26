<?php

namespace App\view;

use App\Models\Petition;
use Illuminate\View\View;

class PetitionComposer
{
    public function compose(View $view)
    {
        $petitions = petition::where('status' ,'=',0)
            ->orderBy('id','desc')
            ->limit(3)
            ->get();
        $petition_count = petition::where('status','=',0)
            ->where('employee', auth()->user()->id)
            ->count();

        $view->with([
            'petition_count' => $petition_count,
            'petitions' => $petitions
        ]);
    }
}
