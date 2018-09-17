<?php

namespace App\Http\Controllers;

use App\Mail\QuotationReceived;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class QuotationController extends Controller
{
    public function index(Request $request)
    {
        $quotations = Quotation::all();

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
}
