<?php

namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;
use Validator;

class QuotationController extends Controller
{
    public function index(Request $request)
    {

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

            return redirect('/cotizador')
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

        $notification = array(
            'message' => 'Hemos recibido tu solicitud, te contactaremos a la brevedad.',
            'title' => 'Gracias',
            'alert-type' => 'info',
        );

        return redirect('/cotizador')->with($notification);
    }
}
