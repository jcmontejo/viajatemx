<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;
use Session;

class RouteController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Route::create($request->all());

        Session::flash('message', 'Ruta agregada.');
        Session::flash('status', 'success');

        return redirect('/rutas');

    }

       public function edit($id)
    {
        $route = Route::find($id);

        return view('routes.edit', compact('route'));
    }

    public function update(Request $request)
    {
       $this->validate($request, ['name' => 'required']);

        // Get the provider
        $route = Route::findOrFail($request->input('id'));

        // Update provider
        $route->name = $request->name;
        $route->save();

        return redirect('/rutas')->with('success', 'Registro editado satisfactoriamente.');
    }

    public function destroy($id)
    {
        Route::find($id)->delete();
        return redirect('/rutas')->with('success', 'Registro eliminado satisfactoriamente.');
    }
}
