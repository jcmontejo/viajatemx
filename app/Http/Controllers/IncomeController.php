<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        return view('incomes.index', compact('incomes'));
    }
}
