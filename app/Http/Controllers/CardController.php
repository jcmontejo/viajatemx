<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Session;

class CardController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name_bank' => 'required', 'name_account' => 'required', 'key' => 'required', 'account_number' => 'required']);

        $card = new Card();
        $card->name_bank = $request->name_bank;
        $card->name_account = $request->name_account;
        $card->key = $request->key;
        $card->account_number = $request->account_number;
        $card->save();

        Session::flash('message', 'Tarjeta agregada.');
        Session::flash('status', 'success');

        return redirect('/admin/tarjetas');
    }

    public function edit($id)
    {
        $card = Card::find($id);

        return view('cards.edit', compact('card'));
    }

    public function update(Request $request)
    {
        $this->validate($request, ['name_bank' => 'required', 'name_account' => 'required', 'key' => 'required', 'account_number' => 'required']);

        // Get the provider
        $card = Card::findOrFail($request->input('id'));

        // Update provider
        $card->name_bank = $request->name_bank;
        $card->name_account = $request->name_account;
        $card->key = $request->key;
        $card->account_number = $request->account_number;
        $card->save();

        return redirect('/admin/tarjetas')->with('success', 'Registro editado satisfactoriamente.');
    }

    public function destroy($id)
    {
        Card::find($id)->delete();
        return redirect('/admin/tarjetas')->with('success', 'Registro eliminado satisfactoriamente.');
    }
}
