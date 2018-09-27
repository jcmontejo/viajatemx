<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use Session;

class ProviderController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, ['name' => 'required', 'contact' => 'required', 'email' => 'required|string|email|max:255', 'phone' => 'required|digits:10']);

        $provider = new Provider();
        $provider->name = $request->name;
        $provider->contact = $request->contact;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->save();

        Session::flash('message', 'Proveedor agregado.');
        Session::flash('status', 'success');

        return redirect('/proveedores');
    }

    public function edit($id)
    {
        $provider = Provider::find($id);

        return view('providers.edit', compact('provider'));
    }

    public function update(Request $request)
    {
       $this->validate($request, ['name' => 'required', 'contact' => 'required', 'email' => 'required|string|email|max:255', 'phone' => 'required|digits:10']);

        // Get the provider
        $provider = Provider::findOrFail($request->input('id'));

        // Update provider
        $provider->name = $request->name;
        $provider->contact = $request->contact;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->save();

        return redirect('/proveedores')->with('success', 'Registro editado satisfactoriamente.');
    }

    public function destroy($id)
    {
        Provider::find($id)->delete();
        return redirect('/proveedores')->with('success', 'Registro eliminado satisfactoriamente.');
    }
}
