<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\StoreQuoting;
use App\Provider;
use App\Quotation;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Requests\sendQuotation;


class QuotationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $quotations = Quotation::where('status', '<>', 'payment')->get();
        $providers = Provider::all();
        $routes = Route::all();
        $cards = Card::all();

        return view('requests.index', compact('quotations','providers', 'routes', 'cards'));
    }

    public function create()
    {

    }

    public function store(StoreQuoting $request)
    {
        if ($request->ajax()) {
            $validated = $request->validated();

            $quotation = new Quotation;
            $quotation->name_client = $request->name_client;
            if ($request->concept == 0) {
                $quotation->concept = 'Transporte Sencillo';
            } elseif ($request->concept == 1) {
                $quotation->concept = 'Transporte Redondo';
            } elseif ($request->concept == 2) {
                $quotation->concept = 'Hospedaje';
            } elseif ($request->concept == 3) {
                $quotation->concept = 'Evento';
            } elseif ($request->concept == 4) {
                $quotation->concept = 'Experiencia Individual';
            } elseif ($request->concept == 5) {
                $quotation->concept = 'Experiencia Grupal';
            }
            $quotation->destination = $request->destination;
            if ($request->departure_date) {
                $quotation->departure_date = $request->departure_date;
            }
            if ($request->return_date) {
                $quotation->return_date = $request->return_date;
            }
            if ($request->transport) {
                $quotation->transport = $request->transport;
            }
            $quotation->phone = $request->phone;
            $quotation->email = $request->email;
            // $quotation->birthdate = $request->birthdate;
            // $quotation->facebook = $request->facebook;
            $quotation->suscribe = 'on';
            $quotation->trip_description = $request->trip_description;
            $quotation->save();

            // Mail::to($quotation->email)->send(new QuotationReceived());

            return response()->json([
                //"message" => "success",
                "data" => $request->all(),
            ]);
        }

    }

    public function process($id)
    {
        $quotation = Quotation::find($id);
        return view('requests.process', compact('quotation'));
    }

    public function send(sendQuotation $request)
    {   
        $validated = $request->validated();

        $quotation = Quotation::find($request->id);

        $quotation->attended = $request->attended;
        $quotation->send = $request->send;
        $quotation->medium = $request->medium;
        $quotation->date_send = $request->date_send;
        $quotation->status = 'send';

        if ($request->notes) {
            $quotation->notes = $request->notes;
        }

        if ($request->hasFile('file')) {
            $extension = $request->file('file');
            $extension = $request->file('file')->getClientOriginalExtension(); // getting excel extension
            $dir = 'assets/files/';
            $file = uniqid() . '_' . time() . '_' . date('Ymd') . '.' . $extension;
            $request->file('file')->move($dir, $file);

            // Save Document
            $quotation->file = $file;
        }

        $quotation->save();

        //return response()->json(["message" => "success"]);
        return response()->json(["data" => $quotation]);
    }

    public function sale($id)
    {
        $quotation = Quotation::find($id);
        $providers = Provider::all();
        $routes = Route::all();
        $cards = Card::all();

        return view('requests.sale', compact('quotation', 'providers', 'routes', 'cards'));
    }

    public function edit($id)
    {
        $quotation = Quotation::find($id);

        return view('requests.edit', compact('quotation'));
    }

    public function update(Request $request)
    {
        $this->validate($request, ['medium' => 'required', 'date_send' => 'required']);

        $quotation = Quotation::findOrFail($request->input('id'));

        $quotation->medium = $request->medium;
        $quotation->date_send = $request->date_send;
        $quotation->notes = $request->notes;
        $quotation->save();

        return redirect('/admin/solicitudes')->with('success', 'Registro editado satisfactoriamente.');
    }

    public function show($id)
    {
        $request = Quotation::find($id);
        return response()->json($request);
    }
}
