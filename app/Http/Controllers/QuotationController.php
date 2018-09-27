<?php

namespace App\Http\Controllers;

use App\Card;
use App\Mail\QuotationReceived;
use App\Provider;
use App\Quotation;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class QuotationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $quotations = Quotation::where('status', '<>', 'payment')->get();

        return view('requests.index', compact('quotations'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'concept' => 'required',
            'destination' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Tienes que llenar todos los campos que son obligatorios (requeridos).',
                'title' => 'Error',
                'alert-type' => 'error',
            );

            return redirect('/clientes/cotizador')
                ->with($notification)
                ->withInput();
        }

        $quotation = new Quotation;
        $quotation->name_client = $request->name;
        $quotation->concept = $request->concept;
        $quotation->destination = $request->destination;
        $quotation->phone = $request->phone;
        $quotation->email = $request->email;
        $quotation->facebook = $request->facebook;
        $quotation->suscribe = $request->suscribe;
        $quotation->trip_description = $request->trip_description;
        $quotation->save();

        Mail::to($quotation->email)->send(new QuotationReceived());

        $notification = array(
            'message' => 'Hemos recibido tu solicitud, te contactaremos a la brevedad.',
            'title' => 'Gracias',
            'alert-type' => 'info',
        );

        return redirect('/clientes/cotizador')->with($notification);
    }

    public function process($id)
    {
        $quotation = Quotation::find($id);
        return view('requests.process', compact('quotation'));
    }

    public function send(Request $request)
    {
        $quotation = Quotation::find($request->id);

        $quotation->attended = $request->attended;
        $quotation->send = $request->send;
        $quotation->medium = $request->medium;
        $quotation->date_send = $request->date_send;
        $quotation->status = 'send';

        if ($request->notes) {
            $quotation->notes = $request->notes;
        }
        $quotation->save();

        $notification = array(
            'message' => 'Solicitud procesada exitosamente.',
            'title' => 'Gracias',
            'alert-type' => 'info',
        );

        return redirect('/admin/solicitudes')->with($notification);
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
}
