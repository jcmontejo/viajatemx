<?php

namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;

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
        $quotation = new Quotation;
        $quotation->concept = $request->concept;
        $quotation->destination = $request->destination;
        $quotation->phone = $request->phone;
        $quotation->email = $request->email;
        $quotation->facebook = $request->facebook;
        $quotation->suscribe = $request->suscribe;
        $quotation->save();

        $notification = array(
            'message' => 'Hemos recibido tu solicitud y te contactaremos a la brevedad.',
            'title' => 'Gracias',
            'alert-type' => 'success',
        );

        return redirect('/cotizador')->with($notification);
    }
}
