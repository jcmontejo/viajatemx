<?php

namespace App\Http\Controllers;

use App\Client;
use App\Quotation;
use App\Sale;
use Carbon\Carbon;
use DB;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

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
        $month = Carbon::now()->month;

        $sales = Sale::where(DB::raw('MONTH(created_at)'), '=', date($month))->get();
        $quotations = Quotation::where(DB::raw('MONTH(created_at)'), '=', date($month))->get();
        $clients = Client::where(DB::raw('MONTH(created_at)'), '=', date($month))->get();

        $incomes = DB::table('incomes')->sum('ammount');
        $expenses = DB::table('expenses')->sum('ammount');
        $earnings = $incomes - $expenses;

        $chartjs = app()->chartjs
            ->name('Balance')
            ->type('pie')
            ->size(['width' => 400, 'height' => 350])
            ->labels(['Gastos', 'Ingresos', 'Ganancias'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#7B1FA2'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#7B1FA2'],
                    'data' => [$expenses, $incomes, $earnings],
                ],
            ])
            ->options([]);

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
                    new \DateTime($year . '-' . $month . '-' . $day),
                    new \DateTime($year . '-' . $month . '-' . $day . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#ff0000',
                        'url' => '/cumpleaños/' . $value->id,
                    ]
                );
            }
        }
        $travels = [];
        $data_travels = Sale::all();
        if ($data_travels->count()) {
            foreach ($data_travels as $key => $item) {
                $travels[] = Calendar::event(
                    $item->destination,
                    true,
                    new \DateTime($item->departure_date),
                    new \DateTime($item->departure_date . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#388E3C',
                        'url' => '/detalles/venta/' . $item->id,
                    ]
                );
            }
        }

        $calendar = Calendar::addEvents($events);
        $calendar = Calendar::addEvents($travels);

        return view('home', compact('calendar', 'chartjs', 'sales', 'quotations', 'clients'));
    }
}
