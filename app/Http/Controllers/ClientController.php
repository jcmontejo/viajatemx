<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Session;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|string|email|max:255', 'phone' => 'required|digits:10']);

        $upper = strtoupper($request->name);

        $client = new Client();
        $client->brand = str_slug($upper);
        $client->name = $request->name;
        $client->birthdate = $request->birthdate;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->suscribe = 'on';
        $client->fiscal_data = $request->fiscal_data;
        $client->airline_accounts = $request->airline_accounts;
        $client->save();

        Session::flash('message', 'Cliente agregado.');
        Session::flash('status', 'success');

        return redirect('/admin/clientes');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|string|email|max:255', 'phone' => 'required|digits:10']);

        // Get the client
        $client = Client::findOrFail($request->input('id'));

        // Update client
        $client->name = $request->name;
        $client->birthdate = $request->birthdate;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->fiscal_data = $request->fiscal_data;
        $client->airline_accounts = $request->airline_accounts;
        $client->save();

        return redirect('/admin/clientes')->with('success', 'Registro editado satisfactoriamente.');
    }

    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect('/admin/clientes')->with('success', 'Registro eliminado satisfactoriamente.');
    }
}
