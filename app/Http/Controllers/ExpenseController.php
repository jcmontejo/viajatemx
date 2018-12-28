<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Session;
use App\Card;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }

    public function register(Request $request)
    {
        $bank = Card::find($request->bank);

        $expense = new Expense();
        $expense->date = $request->date;
        $expense->ammount = $request->ammount;
        $expense->concept = $request->concept;
        $expense->name_bank = $bank->name_bank;
        $expense->name_account = $bank->name_account;
        $expense->account_number = $bank->account_number;
        $expense->save();

        Session::flash('message', 'Gasto registrado exitosamente.');
        Session::flash('status', 'success');

        return redirect('/gastos/');
    }
}
