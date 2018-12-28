<?php

namespace App\Http\Controllers;

use App\Client;
use App\Sale;
use App\Invoice;
use Illuminate\Http\Request;
use Session;

class InvoiceController extends Controller
{
    public function create($client, $sale)
    {
        $client = Client::find($client);
        $sale = Sale::find($sale);
        return view('invoices.create', compact('client', 'sale'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['number_invoice' => 'required', 'fiscal_number' => 'required', 'client' => 'required',
            'business_name' => 'required', 'rfc' => 'required', 'concept' => 'required', 'date' => 'required', 'ammount' => 'required',
            'status' => 'required', 'payment_date' => 'required']);

        $invoice = new Invoice();
        $invoice->number_invoice = $request->number_invoice;
        $invoice->fiscal_number = $request->fiscal_number;
        $invoice->client = $request->client;
        $invoice->business_name = $request->business_name;
        $invoice->rfc = $request->rfc;
        $invoice->concept = $request->concept;
        $invoice->date = $request->date;
        $invoice->ammount = $request->ammount;
        $invoice->status = $request->status;
        $invoice->payment_date = $request->payment_date;
        $invoice->sale_id = $request->sale_id;
        
        $invoice->save();
        return response()->json(["message" => "success"]);
    }

    public function show($id)
    {   
        $sale = Sale::find($id);
        $client = Client::where('id',$sale->client_id)->first();
        $invoice = Invoice::where('sale_id','=',$id)->first();

       return response()->json($invoice);
    }

    public function success()
    {
        $invoices = Invoice::where('status','PAGADA')->get();
        return view('invoices.success',compact('invoices'));
    }

    public function pending()
    {
        $invoices = Invoice::where('status','PENDIENTE')->get();
        return view('invoices.pendings',compact('invoices'));
    }

    public function emit($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 'PAGADA';
        $invoice->save();

        return response()->json(["message" => "success"]);
    }
}
