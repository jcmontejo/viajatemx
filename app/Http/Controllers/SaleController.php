<?php

namespace App\Http\Controllers;

use App\Card;
use App\Client;
use App\Expense;
use App\Income;
use App\Provider;
use App\Quotation;
use App\Route;
use App\Sale;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function payments()
    {
        $sales = Sale::where('payment_status', 'PAGADO')->get();
        return view('sales.sales-payments', compact('sales'));
    }

    public function debts()
    {
        $sales = Sale::where('payment_status', 'PARCIAL')->get();
        return view('sales.sales-debts', compact('sales'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $upper = strtoupper($request->client);

            $client = new Client;
            $client->brand = str_slug($upper);
            $client->name = $request->client;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->suscribe = $request->suscribe;
            $client->save();

            $mytime = Carbon::now('America/Mexico_City');
            $card = Card::find($request->tdc);

            $sale = new Sale();
            $sale->date = $request->date;
            $sale->provider = $request->provider;
            $sale->client = $request->client;
            $sale->passenger = $request->passenger;
            $sale->key = $request->key;
            $sale->destination = $request->destination;
            $sale->route = $request->route;
            $sale->departure_date = $request->departure_date;
            $sale->schedule = $request->schedule;
            $sale->unit_price = $request->unit_price;
            $sale->commission_price = $request->commission_price;
            $sale->tdc = $card->name_account;
            $sale->payment_status = $request->payment_status;
            $sale->way_to_pay = $request->way_to_pay;
            $sale->paid_out = $request->paid_out;
            $sale->debt = $sale->commission_price - $sale->paid_out;
            $sale->client_id = $client->id;
            $sale->save();

            if ($sale) {
                $quotation = Quotation::find($request->quotation);
                $quotation->status = 'payment';
                $quotation->save();

                $income = new Income;
                $income->date = $mytime->toDateString();
                $income->ammount = $sale->paid_out;
                $income->concept = 'Venta';
                $income->sale_id = $sale->id;
                $income->save();

                $expense = new Expense;
                $expense->date = $mytime->toDateString();
                $expense->ammount = $sale->unit_price;
                $expense->concept = 'Pago de viaje';
                $expense->name_bank = $card->name_bank;
                $expense->name_account = $card->name_account;
                $expense->account_number = $card->account_number;
                $expense->save();
            }
            DB::commit();
            return redirect('/admin/ventas')->with('success', 'Registro creado satisfactoriamente.');
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function generate()
    {
        $providers = Provider::all();
        $routes = Route::all();
        $cards = Card::all();
        $clients = Client::all();

        return view('sales.generate', compact('providers', 'routes', 'cards', 'clients'));
    }

    public function generateSave(Request $request)
    {
        $this->validate($request, ['date' => 'required', 'provider' => 'required', 'client' => 'required',
            'passenger' => 'required', 'key' => 'required', 'destination' => 'required', 'route' => 'required',
            'departure_date' => 'required', 'schedule' => 'required', 'unit_price' => 'required',
            'commission_price' => 'required', 'tdc' => 'required', 'payment_status' => 'required', 'way_to_pay' => 'required']);

        try {
            DB::beginTransaction();
            $card = Card::find($request->tdc);
            $mytime = Carbon::now('America/Mexico_City');

            $client = Client::find($request->client);

            $sale = new Sale();
            $sale->date = $request->date;
            $sale->provider = $request->provider;
            $sale->client = $client->name;
            $sale->passenger = $request->passenger;
            $sale->key = $request->key;
            $sale->destination = $request->destination;
            $sale->route = $request->route;
            $sale->departure_date = $request->departure_date;
            $sale->schedule = $request->schedule;
            $sale->unit_price = $request->unit_price;
            $sale->commission_price = $request->commission_price;
            $sale->tdc = $card->name_account;
            $sale->payment_status = $request->payment_status;
            $sale->way_to_pay = $request->way_to_pay;
            $sale->paid_out = $request->paid_out;
            $sale->debt = $sale->commission_price - $sale->paid_out;
            $sale->client_id = $client->id;
            $sale->save();

            if ($sale) {
                $income = new Income;
                $income->date = $mytime->toDateString();
                $income->ammount = $sale->paid_out;
                $income->concept = 'Venta';
                $income->sale_id = $sale->id;
                $income->save();

                $expense = new Expense;
                $expense->date = $mytime->toDateString();
                $expense->ammount = $sale->unit_price;
                $expense->concept = 'Pago de viaje';
                $expense->name_bank = $card->name_bank;
                $expense->name_account = $card->name_account;
                $expense->account_number = $card->account_number;
                $expense->save();
            }
            DB::commit();
            return redirect('/admin/ventas')->with('success', 'Registro creado satisfactoriamente.');

        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
