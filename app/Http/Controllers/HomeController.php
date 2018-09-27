<?php

namespace App\Http\Controllers;
use App\Client;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $data = Client::all();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $now = Carbon::now();
                $date = new Carbon($value->birthdate);
                $year = $now->year;
                $month = $date->month;
                $day = $date->day;

                $events[] = Calendar::event(
                    $value->name,
                    true,
                    new \DateTime($year.'-'.$month.'-'.$day),
                    new \DateTime($year.'-'.$month.'-'.$day . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#ff0000',
                        'url' => '/cumpleaños/'.$value->id,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        // return view('fullcalender', compact('calendar'));
        return view('home',compact('calendar'));
    }
}
