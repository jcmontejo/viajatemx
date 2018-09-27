<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotingController extends Controller
{   
    public function showQuoting()
    {
        return view('quoting.index');
    }

    public function saveQuoting(Request $request)
    {
       $data = $request->all();
       return $data;
    }
}
