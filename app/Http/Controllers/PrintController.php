<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Time;


class PrintController extends Controller
{
    public function userview()
    {
        $user = User::all()->sortBy('lock', SORT_NATURAL|SORT_FLAG_CASE);
        $time = Time::all();

        return view('print', ['User' => $user], ['times' => $time]);
    }

    public function resetcome()
    {

        User::where('come', NULL)-> where('ban', NULL)-> whereNotNull('name')-> increment('count',1);  //not come not ban
        
        User::query()->update(['come' => NULL]);
        return redirect('print')->with('success', 'database has been updated');
    }
}