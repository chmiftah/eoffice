<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class AgendaController extends Controller
{
    //
    public function index()
    {
        return view('agenda.index');
    }

    public function store(Request $request)
    {
        $startTime= Carbon::parse($request->input('tanggal').' '. $request->input('jam'). 'Asia/Jakarta');
        $endTime = (clone $startTime)->addHour();

        Event::create([
                'name'=>$request->input('name'),
                'startDateTime'=>$startTime,
                'endDateTime'=>$endTime,
        ]);
        //dd('oke');
    }
}
