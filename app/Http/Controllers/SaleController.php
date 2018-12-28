<?php

namespace App\Http\Controllers;

use App\Card;
use App\Client;
use App\Expense;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\terminateSale;
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

    protected $rules =
        [
        'ammount' => 'required',
        'sale' => 'required',
    ];

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
        return view('sales.sales-debts');
    }

    public function showSale($id)
    {
        $data = Sale::find($id);
        return response()->json($data);
    }

    public function listDebts()
    {
        $sales = Sale::where('payment_status', 'PARCIAL')->paginate(5);
        return view('sales.list-debt', compact('sales'));
    }

    public function store(terminateSale $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();

            $quotationReceived = Quotation::find($request->idQuotation);

            $upper = strtoupper($quotationReceived->name_client);

            $client = new Client;
            $client->brand = str_slug($upper);
            $client->name = $quotationReceived->name_client;
            $client->phone = $quotationReceived->phone;
            $client->email = $quotationReceived->email;
            $client->birthdate = $quotationReceived->birthdate;
            $client->suscribe = $quotationReceived->suscribe;
            $client->save();

            $mytime = Carbon::now('America/Mexico_City');
            $card = Card::find($request->tdc);

            $sale = new Sale();
            $sale->date = $request->date;
            $sale->provider = $request->provider;
            $sale->client = $client->name;
            $sale->passenger = $request->passenger;
            $sale->key = $request->key;
            $sale->destination = $quotationReceived->destination;
            $sale->route = $request->route;
            $sale->departure_date = $request->departure_date;
            $sale->schedule = $request->schedule;
            $sale->unit_price = $request->unit_price;
            $sale->commission_price = $request->commission_price;
            $sale->tdc = $card->name_account;
            if ($request->paid_out < $request->commission_price) {
                $sale->payment_status = 'PARCIAL';
            } else {
                $sale->payment_status = 'PAGADO';
            }
            $sale->way_to_pay = $request->way_to_pay;
            $sale->paid_out = $request->paid_out;
            $sale->debt = $sale->commission_price - $sale->paid_out;
            $sale->client_id = $client->id;
            $sale->save();

            if ($sale) {
                $quotationReceived->status = 'payment';
                $quotationReceived->save();

                if ($request->paid_out > 0) {
                    $income = new Income;
                    $income->date = $mytime->toDateString();
                    $income->ammount = $sale->paid_out;
                    $income->concept = 'Venta';
                    $income->sale_id = $sale->id;
                    $income->save();
                }

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
            return response()->json(["message" => "success"]);
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
            if ($request->paid_out < $request->commision_price) {
                $sale->payment_status = 'PARCIAL';
            } else {
                $sale->payment_status = 'PAGADO';
            }
            $sale->way_to_pay = $request->way_to_pay;
            $sale->paid_out = $request->paid_out;
            $sale->debt = $sale->commission_price - $sale->paid_out;
            $sale->client_id = $client->id;
            $sale->save();

            if ($sale) {
                if ($sale->paid_out >= 1) {
                    $income = new Income;
                    $income->date = $mytime->toDateString();
                    $income->ammount = $sale->paid_out;
                    $income->concept = 'Venta';
                    $income->sale_id = $sale->id;
                    $income->save();
                }

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

    public function details($id)
    {
        $sale = Sale::find($id);
        return view('sales.details', compact('sale'));
    }

    public function showDebt($id)
    {
        $sale = Sale::find($id);
        return response()->json($sale);
    }

    public function procesPayment(PaymentRequest $request, $id)
    {
        if ($request->ajax()) {
            $sale = Sale::FindOrFail($id);
            if ($request->paid_out > 0 and $request->paid_out <= $sale->debt) {
                $sale->paid_out = $sale->paid_out + $request->paid_out;
                $sale->debt = $sale->debt - $request->paid_out;
                if ($sale->debt == 0) {
                    $sale->payment_status = 'PAGADO';
                }
                $sale->save();
                // Generate income
                $mytime = Carbon::now('America/Mexico_City');

                $income = new Income;
                $income->date = $mytime->toDateString();
                $income->ammount = $request->paid_out;
                $income->concept = 'Venta';
                $income->sale_id = $sale->id;
                $income->save();

            } else {
                return response()->json(['success' => 'false']);
            }
            // $input = $request->all();
            // $result = $sale->fill($input)->save();

            if ($sale) {
                return response()->json(['success' => 'true']);
            } else {
                return response()->json(['success' => 'false']);
            }
        }
    }
}
